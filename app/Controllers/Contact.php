<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'title'      => 'Contact Us - PowerFlow Electric',
            'page'       => 'contact',
            'success'    => session()->getFlashdata('success'),
            'error'      => session()->getFlashdata('error'),
            'validation' => session()->getFlashdata('validation')
        ];

        if ($this->request->getMethod() === 'POST') {
            return $this->submitForm();
        }

        return view('contact', $data);
    }

    private function submitForm()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'         => 'required|min_length[2]|max_length[100]',
            'email'        => 'required|valid_email',
            'phone'        => 'required|min_length[10]|max_length[20]',
            'service_type' => 'required',
            'message'      => 'required|min_length[10]|max_length[1000]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata(
                'validation',
                $validation->getErrors()
            );

            return redirect()->back()->withInput();
        }

        session()->setFlashdata(
            'success',
            'Thank you for your message! We will contact you soon.'
        );

        return redirect()->to('/contact');
    }
}