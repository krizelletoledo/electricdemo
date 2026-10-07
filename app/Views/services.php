<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
$residentialServices = [
    [
        'icon' => 'fa-plug',
        'title' => 'Electrical Wiring',
        'description' => 'Complete home wiring services including new construction, rewiring, and electrical system upgrades to meet modern safety standards.',
        'items' => ['New home wiring', 'Rewiring old homes', 'Code compliance updates', 'Safety inspections']
    ],
    [
        'icon' => 'fa-th-large',
        'title' => 'Panel Upgrades',
        'description' => 'Electrical panel upgrades and replacements to handle increased power demands and improve home safety and efficiency.',
        'items' => ['Panel replacements', 'Circuit breaker upgrades', 'Service capacity increases', 'GFCI installations']
    ],
    [
        'icon' => 'fa-lightbulb',
        'title' => 'Lighting Solutions',
        'description' => 'Indoor and outdoor lighting installations, including LED upgrades, landscape lighting, and smart lighting systems.',
        'items' => ['LED lighting upgrades', 'Landscape lighting', 'Smart lighting systems', 'Security lighting']
    ],
    [
        'icon' => 'fa-mobile-alt',
        'title' => 'Smart Home Automation',
        'description' => 'Transform your home with smart electrical systems, automated controls, and IoT device integration for modern living.',
        'items' => ['Smart switches & outlets', 'Home automation systems', 'Voice control integration', 'Energy monitoring']
    ],
    [
        'icon' => 'fa-car',
        'title' => 'EV Charging Stations',
        'description' => 'Electric vehicle charging station installation for convenient and efficient home charging of your electric vehicle.',
        'items' => ['Level 2 charger installation', 'Electrical capacity assessment', 'Permit handling', 'Smart charging features']
    ],
    [
        'icon' => 'fa-tools',
        'title' => 'Electrical Repairs',
        'description' => 'Quick and reliable electrical repair services for outlets, switches, fixtures, and other electrical components in your home.',
        'items' => ['Outlet & switch repairs', 'Fixture installations', 'Troubleshooting', 'Emergency repairs']
    ]
];

$commercialServices = [
    [
        'icon' => 'fa-industry',
        'title' => 'Commercial Wiring',
        'description' => 'Complete electrical installations for new commercial buildings, tenant improvements, and electrical system expansions.',
        'items' => ['New construction wiring', 'Tenant improvements', 'Office electrical systems', 'Retail installations']
    ],
    [
        'icon' => 'fa-bolt',
        'title' => 'Power Distribution',
        'description' => 'High-voltage power distribution systems, transformers, and electrical infrastructure for commercial and industrial facilities.',
        'items' => ['Power distribution panels', 'Transformer installations', 'Motor control centers', 'Emergency power systems']
    ],
    [
        'icon' => 'fa-video',
        'title' => 'Security & Data Systems',
        'description' => 'Installation of security systems, surveillance cameras, access control, and structured cabling for data networks.',
        'items' => ['Security camera systems', 'Access control systems', 'Network cabling', 'Fire alarm systems']
    ],
    [
        'icon' => 'fa-warehouse',
        'title' => 'Industrial Electrical',
        'description' => 'Specialized electrical services for manufacturing facilities, warehouses, and industrial operations.',
        'items' => ['Machine wiring', 'Control systems', 'High-bay lighting', 'Power factor correction']
    ],
    [
        'icon' => 'fa-wrench',
        'title' => 'Maintenance Services',
        'description' => 'Preventive maintenance programs and ongoing electrical system support to ensure reliable operation and minimize downtime.',
        'items' => ['Preventive maintenance', 'System inspections', 'Thermal imaging', 'Equipment testing']
    ],
    [
        'icon' => 'fa-chart-line',
        'title' => 'Energy Efficiency',
        'description' => 'Energy audits, efficiency upgrades, and power quality improvements to reduce operating costs and improve performance.',
        'items' => ['Energy audits', 'LED retrofits', 'Power quality analysis', 'Demand management']
    ]
];

$solarServices = [
    [
        'icon' => 'fa-sun',
        'title' => 'Solar Panel Installation',
        'description' => 'Complete solar photovoltaic system design and installation for residential and commercial properties.',
        'items' => ['System design & engineering', 'Permit acquisition', 'Professional installation', 'Grid interconnection']
    ],
    [
        'icon' => 'fa-battery-full',
        'title' => 'Energy Storage Systems',
        'description' => 'Battery storage solutions to store solar energy and provide backup power during outages.',
        'items' => ['Battery system design', 'Backup power solutions', 'Grid-tie with battery backup', 'Energy management systems']
    ],
    [
        'icon' => 'fa-calculator',
        'title' => 'Energy Consultation',
        'description' => 'Comprehensive energy assessments and consultation to determine the best renewable energy solutions.',
        'items' => ['Site assessments', 'Energy usage analysis', 'ROI calculations', 'Financing options']
    ],
    [
        'icon' => 'fa-cog',
        'title' => 'System Maintenance',
        'description' => 'Ongoing maintenance and monitoring services to ensure optimal performance of your solar energy system.',
        'items' => ['Performance monitoring', 'Preventive maintenance', 'System cleaning', 'Warranty support']
    ]
];
?>

<section class="hero-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold mb-4">Our Electrical Services</h1>
                <p class="lead">Comprehensive electrical solutions for residential, commercial, and industrial needs</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Complete Electrical Solutions</h2>
                <p class="lead text-muted">
                    From simple repairs to complex installations, we provide safe, reliable,
                    and efficient electrical services tailored to your specific needs.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">
                    <i class="fas fa-home text-secondary-custom me-3"></i>Residential Services
                </h2>
                <p class="lead text-muted">
                    Professional electrical services for your home, ensuring safety,
                    efficiency, and comfort for your family.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($residentialServices as $service): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 p-4 feature-item">
                        <div class="feature-icon">
                            <i class="fas <?= $service['icon'] ?>"></i>
                        </div>

                        <h4 class="text-primary-custom mb-3"><?= $service['title'] ?></h4>
                        <p class="text-muted mb-3"><?= $service['description'] ?></p>

                        <ul class="list-unstyled text-muted small">
                            <?php foreach ($service['items'] as $item): ?>
                                <li><i class="fas fa-check text-success me-2"></i><?= $item ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">
                    <i class="fas fa-building text-secondary-custom me-3"></i>Commercial Services
                </h2>
                <p class="lead text-muted">
                    Reliable electrical solutions for businesses, offices, retail spaces,
                    and industrial facilities.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($commercialServices as $service): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 p-4 feature-item">
                        <div class="feature-icon">
                            <i class="fas <?= $service['icon'] ?>"></i>
                        </div>

                        <h4 class="text-primary-custom mb-3"><?= $service['title'] ?></h4>
                        <p class="text-muted mb-3"><?= $service['description'] ?></p>

                        <ul class="list-unstyled text-muted small">
                            <?php foreach ($service['items'] as $item): ?>
                                <li><i class="fas fa-check text-success me-2"></i><?= $item ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">
                    <i class="fas fa-solar-panel text-secondary-custom me-3"></i>Solar & Renewable Energy
                </h2>
                <p class="lead text-muted">
                    Sustainable energy solutions to reduce your carbon footprint and energy
                    costs with cutting-edge solar technology.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($solarServices as $service): ?>
                <div class="col-lg-6">
                    <div class="card h-100 p-4 feature-item">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-3 text-center">
                                <div class="feature-icon mx-0">
                                    <i class="fas <?= $service['icon'] ?>"></i>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <h4 class="text-primary-custom mb-2"><?= $service['title'] ?></h4>
                                <p class="text-muted mb-3"><?= $service['description'] ?></p>

                                <ul class="list-unstyled text-muted small">
                                    <?php foreach ($service['items'] as $item): ?>
                                        <li><i class="fas fa-check text-success me-2"></i><?= $item ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding bg-danger text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold mb-4">
                    <i class="fas fa-exclamation-triangle text-warning me-3"></i>24/7 Emergency Electrical Service
                </h2>

                <p class="lead mb-4">
                    Electrical emergencies do not wait for business hours. Our emergency
                    electricians are available 24 hours a day, 7 days a week.
                </p>

                <a href="tel:5551234567" class="btn btn-warning btn-lg">
                    <i class="fas fa-phone me-2"></i>Call Emergency Service
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Need a Custom Electrical Solution?</h2>
                <p class="lead text-muted mb-4">
                    Every project is unique. Contact us for a free consultation and personalized quote.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end">
                <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-paper-plane me-2"></i>Get Free Quote
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>