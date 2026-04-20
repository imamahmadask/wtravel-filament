<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How far in advance should I book my trip?',
                'answer' => 'For the best availability and pricing, we recommend booking international trips at least 3–6 months in advance. For domestic travel, 1–2 months is typically sufficient.',
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept all major credit cards (Visa, Mastercard, American Express), PayPal, and bank transfers for certain packages.',
            ],
            [
                'question' => 'Can I modify or cancel my booking?',
                'answer' => 'Yes. Modification and cancellation policies vary depending on the specific service provider. Please refer to your confirmation email for details.',
            ],
            [
                'question' => 'What travel documents do I need for my trip?',
                'answer' => 'All travelers are responsible for ensuring they have a valid passport (6 months validity), necessary visas, and required documentation.',
            ],
            [
                'question' => 'Do I need travel insurance?',
                'answer' => 'While not always mandatory, we strongly recommend purchasing comprehensive travel insurance for protection against unexpected events.',
            ],
            [
                'question' => 'What should I pack for my destination?',
                'answer' => 'Packing requirements vary by destination. Once your booking is confirmed, you will receive a pre-departure guide with a recommended list.',
            ],
            [
                'question' => 'What is the best way to handle money while abroad?',
                'answer' => 'We recommend a mix of payment methods: a travel-friendly credit card, some local currency, and a debit card for ATM withdrawals.',
            ],
        ];

        foreach ($faqs as $faq) {
            \App\Models\Faq::create($faq);
        }
    }
}
