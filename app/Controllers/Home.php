<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomerAccountModel;

class Home extends BaseController
{
    
  
    public function login()
    {
        if (session()->get('isLogged') === true) {
            return redirect()->to('/dashboard');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required|max_length[100]',
                'password' => 'required|max_length[255]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', 'Enter both your username and password.');
            }

            $credentials = $this->request->getPost(['username', 'password']);
            $user = (new UserModel())->where('username', $credentials['username'])->first();

            // New accounts should store passwords with password_hash(). The second
            // condition keeps existing classroom databases with plaintext passwords working.
            $validPassword = $user !== null
                && (password_verify($credentials['password'], $user['password'])
                    || hash_equals((string) $user['password'], (string) $credentials['password']));

            if (! $validPassword) {
                return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
            }

            session()->regenerate();
            session()->set([
                'isLogged' => true,
                'user_id'  => $user['id'],
                'username' => $user['username'],
            ]);

            return redirect()->to('/dashboard');
        }

        return view('login');
    }

    public function dashboard()
    {
        if (session()->get('isLogged') !== true) {
            return redirect()->to('/login');
        }

        $model = new CustomerAccountModel();
        $search = trim((string) $this->request->getGet('search'));
        $status = (string) $this->request->getGet('status');
        $type = (string) $this->request->getGet('type');
        $stats = new CustomerAccountModel();

        return view('dashboard', [
            'username' => session()->get('username'),
            'accounts' => $model->filteredAccounts($search, $status, $type, 10),
            'pager' => $model->pager,
            'total_accounts' => $stats->countAllResults(),
            'active_accounts' => $stats->countByStatus('active'),
            'inactive_accounts' => $stats->countByStatus('inactive'),
            'suspended_accounts' => $stats->countByStatus('suspended'),
            'search_keyword' => $search,
            'filter_status' => $status,
            'filter_type' => $type,
        ]);
    }

    public function create()
    {
        $this->requireLogin();

        if ($this->request->getMethod() === 'POST') {
            $data = $this->accountData();
            if (! $this->validate($this->accountRules())) {
                return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
            }

            $model = new CustomerAccountModel();
            if (! $model->insert($data)) {
                return redirect()->back()->withInput()->with('error', implode(' ', $model->errors()));
            }

            return redirect()->to('/dashboard')->with('success', 'Customer account added successfully.');
        }

        return view('account_form', ['title' => 'Add Customer Account', 'account' => []]);
    }

    public function edit(int $id)
    {
        $this->requireLogin();
        $model = new CustomerAccountModel();
        $account = $model->find($id);

        if (! $account) {
            return redirect()->to('/dashboard')->with('error', 'Customer account not found.');
        }

        if ($this->request->getMethod() === 'POST') {
            $data = $this->accountData();
            if (! $this->validate($this->accountRules($id))) {
                return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
            }

            if (! $model->update($id, $data)) {
                return redirect()->back()->withInput()->with('error', implode(' ', $model->errors()));
            }

            return redirect()->to('/dashboard')->with('success', 'Customer account updated successfully.');
        }

        return view('account_form', ['title' => 'Edit Customer Account', 'account' => $account]);
    }

    public function delete(int $id)
    {
        $this->requireLogin();

        if ($this->request->getMethod() !== 'POST') {
            return redirect()->to('/dashboard');
        }

        $model = new CustomerAccountModel();
        if ($model->delete($id)) {
            return redirect()->to('/dashboard')->with('success', 'Customer account deleted successfully.');
        }

        return redirect()->to('/dashboard')->with('error', 'Unable to delete customer account.');
    }

    public function viewAccount(int $id)
    {
        $this->requireLogin();
        $account = (new CustomerAccountModel())->find($id);
        if (! $account) {
            return redirect()->to('/dashboard')->with('error', 'Customer account not found.');
        }

        return view('account_view', ['account' => $account]);
    }

    private function requireLogin(): void
    {
        if (session()->get('isLogged') !== true) {
            header('Location: ' . base_url('login'));
            exit;
        }
    }

    private function accountData(): array
    {
        return [
            'account_number' => trim((string) $this->request->getPost('account_number')),
            'customer_name' => trim((string) $this->request->getPost('customer_name')),
            'address' => trim((string) $this->request->getPost('address')),
            'phone' => trim((string) $this->request->getPost('phone')),
            'email' => trim((string) $this->request->getPost('email')),
            'meter_number' => trim((string) $this->request->getPost('meter_number')),
            'connection_type' => $this->request->getPost('connection_type'),
            'status' => $this->request->getPost('status'),
        ];
    }

    private function accountRules(?int $id = null): array
    {
        $unique = $id ? ',id,' . $id : '';
        return [
            'account_number' => 'required|max_length[50]|is_unique[customer_accounts.account_number' . $unique . ']',
            'customer_name' => 'required|max_length[150]',
            'address' => 'required',
            'phone' => 'permit_empty|max_length[20]',
            'email' => 'permit_empty|valid_email|max_length[100]',
            'meter_number' => 'permit_empty|max_length[50]',
            'connection_type' => 'required|in_list[residential,commercial,industrial]',
            'status' => 'required|in_list[active,inactive,suspended]',
        ];
    }

    public function logout()
    {
        if (session()->get('isLogged') !== true) {
            return redirect()->to('/login');
        }

        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }


    
}
