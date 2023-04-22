<?php


namespace App\Services;





class SeedService
{
    public static function getRandomHotDogImageUrl()
    {
        $urls = [
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRck10e3yX86CfUqJad3_xbsBYDy5g19d9wHw',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReeGZVU5oF_cplBzp59Nx8de5t79qgfNkoVg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfRUEdUcxmd29nViqXQJrnUw_8S__eSBHiJg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnUL0tYgP4TWZ-Wtp3oLr1f-xr6KL_g3ajUQ',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgaKYj9IQMhQWhTiAT7QwQRbYH93A9hBbbPw',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCA2sr9zR12fSJeMzDqAcTlUMy4XZ4qRCnGg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjdMDuAU0TMaOVHm2MUqCkmdNw5GMH6Vuaww',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaxKc-Y6JaiOlWa7nMBmL_0h-w8CuyBzMUaA',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEX63qssave5PHtT84LP1Qx7J8zcSh7U1inw',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTj-m9OB3xus584r-1rHXCXtoNUaOsNQBKcLA',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtDFPSLKfQrhCq7dFQzYyqpKosZIHU-2h0xA',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFkY0K693xCeXo21OdDKfx3f14LoTIMO1z-A',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQju0ef7BEspSnOl7uqe0BQMtrhErg_ozl-rg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3r4dfvhh9_dqbPDNjGPf5F4tdBHAfYzNDGw',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIHR1AaWfO5Z3mceVn_2r4M-ZHIJ1woOO9vA',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT70tyCj9dXZUjE4yM1NTZZYS5_BIHv7zv_3g',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTC2bygNlSN1ylxBwyprBwTudztHkPXXZ2cWQ',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8oQ9_kN9nu88ZK_Ca1sduYMjDSRAqG98SiA',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_vJjiyI4hhreZVVWRk9t3MsbR784jbMU7BQ',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYEdzIowjFya0vOolR_SDqFS4BqnZiGCd88Q',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQas6SQDDxmFYvbAV8kJrEDGeA96vm3BeEWfA',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVxvND6aJY0zDSqK8DQwYSYz9qABZ9l5OcYg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShNVBMm44rxCumlxkLSj63OCgzmeiGtY5b0w',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRckDuz9IAW-GtFkLXTg47MIgaUauvegNEyng',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFS2iFFE0Jn7DUPSEf1W7vuhG4iDsi2EcE0Q',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5gm2H5XhMWb5-ddBfNbkc8BQuwE893dKzkA',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxZvNZavUWHGbHMhNsapSxvyugoXYVw9GcZA',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjZQOKIAXmHGOsu94N49DfSFS7tINTRFmr3A',
        ];

        return $urls[rand(0, count($urls) - 1)];
    }
}