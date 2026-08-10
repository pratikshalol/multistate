<?php
// create_placeholders.php

$dirs = [
    'public/uploads/banners',
    'public/uploads/deposits',
    'public/uploads/loans',
    'public/uploads/branches',
    'public/uploads/testimonials',
    'public/uploads/notices',
    'public/uploads/settings',
    'public/uploads/applications',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

function makeSvgImage($filename, $title, $subtitle, $bgColor, $textColor, $width = 600, $height = 400, $icon = '🏦') {
    $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="{$width}" height="{$height}" viewBox="0 0 {$width} {$height}">
  <rect width="100%" height="100%" fill="{$bgColor}" rx="16"/>
  <circle cx="80%" cy="20%" r="120" fill="#ffffff" opacity="0.08"/>
  <circle cx="20%" cy="80%" r="180" fill="#ffffff" opacity="0.05"/>
  <text x="50%" y="40%" font-family="system-ui, sans-serif" font-size="64" text-anchor="middle" dominant-baseline="middle">{$icon}</text>
  <text x="50%" y="60%" font-family="system-ui, sans-serif" font-size="24" font-weight="bold" fill="{$textColor}" text-anchor="middle" dominant-baseline="middle">{$title}</text>
  <text x="50%" y="72%" font-family="system-ui, sans-serif" font-size="16" fill="{$textColor}" opacity="0.8" text-anchor="middle" dominant-baseline="middle">{$subtitle}</text>
</svg>
SVG;
    file_put_contents($filename, $svg);
}

// Banners
makeSvgImage('public/uploads/banners/hero_deposit_graphic.png', '10.50% Fixed Deposit', 'High Returns & Security', '#0f2942', '#ffffff', 600, 450, '💰');
makeSvgImage('public/uploads/banners/hero_gold_loan.png', 'Instant Gold Loan', 'Sanctioned in 15 Mins', '#78350f', '#ffffff', 600, 450, '👑');
makeSvgImage('public/uploads/banners/hero_mobile_banking.png', 'Samarth Mobile Banking', '24x7 Digital Access', '#047857', '#ffffff', 600, 450, '📱');

// Deposits
makeSvgImage('public/uploads/deposits/fixed_deposit.jpg', 'Fixed Deposit (FD)', 'Up to 10.50% p.a.', '#1e3a8a', '#ffffff', 500, 350, '📈');
makeSvgImage('public/uploads/deposits/pigmy_deposit.jpg', 'Pigmy Daily Deposit', 'Doorstep Collection', '#065f46', '#ffffff', 500, 350, '🐖');
makeSvgImage('public/uploads/deposits/pension_deposit.jpg', 'Pension Deposit', 'Monthly Guaranteed Income', '#831843', '#ffffff', 500, 350, '👴');
makeSvgImage('public/uploads/deposits/recurring_deposit.jpg', 'Future Recurring Deposit', 'Disciplined Monthly Wealth', '#4c1d95', '#ffffff', 500, 350, '⏳');

// Loans
makeSvgImage('public/uploads/loans/gold_loan.jpg', 'Gold Loan', 'Up to 85% Market Value', '#b45309', '#ffffff', 500, 350, '✨');
makeSvgImage('public/uploads/loans/property_loan.jpg', 'Property & Housing Loan', 'Up to 15 Years Tenure', '#1e40af', '#ffffff', 500, 350, '🏠');
makeSvgImage('public/uploads/loans/two_wheeler_loan.jpg', 'Two-Wheeler Loan', 'Up to 90% Vehicle Cost', '#047857', '#ffffff', 500, 350, '🛵');
makeSvgImage('public/uploads/loans/loan_against_deposit.jpg', 'Loan Against Deposit', 'Instant 90% Liquidity', '#374151', '#ffffff', 500, 350, '💳');

// Testimonials
makeSvgImage('public/uploads/testimonials/user1.jpg', 'Rajesh Sharma', 'FD Customer', '#0f2942', '#ffffff', 200, 200, '👤');
makeSvgImage('public/uploads/testimonials/user2.jpg', 'Sunita Deshmukh', 'Pigmy Depositor', '#047857', '#ffffff', 200, 200, '👩');
makeSvgImage('public/uploads/testimonials/user3.jpg', 'Vikram Joshi', 'Gold Loan Client', '#b45309', '#ffffff', 200, 200, '👨');

// Logo
$logoSvg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="300" height="70" viewBox="0 0 300 70">
  <rect width="100%" height="100%" fill="transparent"/>
  <circle cx="35" cy="35" r="24" fill="#0f2942"/>
  <path d="M 23,45 L 35,20 L 47,45 Z" fill="#d97706"/>
  <text x="70" y="32" font-family="system-ui, sans-serif" font-size="18" font-weight="900" fill="#0f2942">Samarth MULTISTATE</text>
  <text x="70" y="48" font-family="system-ui, sans-serif" font-size="10" font-weight="bold" fill="#d97706" letter-spacing="1">CO-OPERATIVE CREDIT SOCIETY LTD.</text>
</svg>
SVG;
file_put_contents('public/uploads/settings/logo.png', $logoSvg);

echo "Placeholder SVG graphics generated successfully!\n";
