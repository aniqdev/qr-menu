@extends('layouts.empty')

@section('content')
<link rel="stylesheet" href="/css/dashboard-statistic.css">
<div class="PageSection-Content" data-v-0066fcdb="" style="padding: 0 10px;">
    <div class="PageTabs" data-v-9eb481e8="" style="margin-bottom: 24px; margin-top: 16px;">
        <div class="Active PageTab" data-v-9eb481e8="">Сьогодні</div>
        <div class="PageTab" data-v-9eb481e8="">Вчора</div>
        <div class="PageTab" data-v-9eb481e8="">7 днів</div>
    </div>
    <div class="HomePageWrapper" data-v-9eb481e8="">
        <div class="Left" data-v-9eb481e8="">
            <div class="Numbers" data-v-9eb481e8="">
                <div class="Active Number-Card" data-v-458d7735="" data-v-9eb481e8="">
                    <div class="Card-Title" data-v-458d7735="">онлайн</div>
                    <h1 class="Number" data-v-458d7735="">2</h1>
                </div>
                <div class="Number-Card" data-v-458d7735="" data-v-9eb481e8="">
                    <div class="Card-Title" data-v-458d7735="">візити</div>
                    <h1 class="Number" data-v-458d7735="">1</h1>
                </div>
                <div class="Number-Card" data-v-458d7735="" data-v-9eb481e8="">
                    <div class="Card-Title" data-v-458d7735="">відгуки</div>
                    <h1 class="Number" data-v-458d7735="">0</h1>
                </div>
            </div>
            <div class="Full Card Timeline" data-v-9eb481e8="">
                <!---->
                <div class="Card-Title">Останні візити</div>
                <div class="Card-Content">
                    <div class="vue-apexcharts Chart" data-v-9eb481e8="" style="min-height: 466.553px;">
                        <div id="apexchartsvuechartxexample" class="apexcharts-canvas apexchartsvuechartxexample apexcharts-theme-light" style="max-width: 727px; height: 451.553px;">
{{--                             <svg id="SvgjsSvg9302" width="" height="451.5527950310559" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG9304" class="apexcharts-inner apexcharts-graphical" transform="translate(22, 30)">
                                    <defs id="SvgjsDefs9303">
                                        <linearGradient id="SvgjsLinearGradient9307" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop9308" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop9309" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop9310" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMask9x8f8eve">
                                            <rect id="SvgjsRect9312" width="699" height="383.9007950310559" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMask9x8f8eve"></clipPath>
                                        <clipPath id="nonForecastMask9x8f8eve"></clipPath>
                                        <clipPath id="gridRectMarkerMask9x8f8eve">
                                            <rect id="SvgjsRect9313" width="699" height="387.9007950310559" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect9311" width="48.65" height="383.9007950310559" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient9307)" class="apexcharts-xcrosshairs" y2="383.9007950310559" filter="none" fill-opacity="0.9"></rect>
                                    <g id="SvgjsG9338" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG9339" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                            <text id="SvgjsText9341" font-family="Helvetica, Arial, sans-serif" x="34.75" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9342">11:26</tspan>
                                                <title>11:26</title>
                                            </text>
                                            <text id="SvgjsText9344" font-family="Helvetica, Arial, sans-serif" x="104.25" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9345">11:27</tspan>
                                                <title>11:27</title>
                                            </text>
                                            <text id="SvgjsText9347" font-family="Helvetica, Arial, sans-serif" x="173.75" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9348">11:28</tspan>
                                                <title>11:28</title>
                                            </text>
                                            <text id="SvgjsText9350" font-family="Helvetica, Arial, sans-serif" x="243.25" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9351">11:29</tspan>
                                                <title>11:29</title>
                                            </text>
                                            <text id="SvgjsText9353" font-family="Helvetica, Arial, sans-serif" x="312.75" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9354">11:30</tspan>
                                                <title>11:30</title>
                                            </text>
                                            <text id="SvgjsText9356" font-family="Helvetica, Arial, sans-serif" x="382.25" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9357">11:31</tspan>
                                                <title>11:31</title>
                                            </text>
                                            <text id="SvgjsText9359" font-family="Helvetica, Arial, sans-serif" x="451.75" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9360">11:32</tspan>
                                                <title>11:32</title>
                                            </text>
                                            <text id="SvgjsText9362" font-family="Helvetica, Arial, sans-serif" x="521.25" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9363">11:33</tspan>
                                                <title>11:33</title>
                                            </text>
                                            <text id="SvgjsText9365" font-family="Helvetica, Arial, sans-serif" x="590.75" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9366">11:34</tspan>
                                                <title>11:34</title>
                                            </text>
                                            <text id="SvgjsText9368" font-family="Helvetica, Arial, sans-serif" x="660.25" y="412.9007950310559" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan9369">11:35</tspan>
                                                <title>11:35</title>
                                            </text>
                                        </g>
                                        <line id="SvgjsLine9370" x1="0" y1="384.9007950310559" x2="695" y2="384.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG9373" class="apexcharts-grid">
                                        <g id="SvgjsG9374" class="apexcharts-gridlines-horizontal" style="display: none;">
                                            <line id="SvgjsLine9387" x1="0" y1="0" x2="695" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine9388" x1="0" y1="76.78015900621118" x2="695" y2="76.78015900621118" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine9389" x1="0" y1="153.56031801242236" x2="695" y2="153.56031801242236" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine9390" x1="0" y1="230.34047701863352" x2="695" y2="230.34047701863352" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine9391" x1="0" y1="307.1206360248447" x2="695" y2="307.1206360248447" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine9392" x1="0" y1="383.9007950310559" x2="695" y2="383.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG9375" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                                        <line id="SvgjsLine9376" x1="0" y1="384.9007950310559" x2="0" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9377" x1="69.5" y1="384.9007950310559" x2="69.5" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9378" x1="139" y1="384.9007950310559" x2="139" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9379" x1="208.5" y1="384.9007950310559" x2="208.5" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9380" x1="278" y1="384.9007950310559" x2="278" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9381" x1="347.5" y1="384.9007950310559" x2="347.5" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9382" x1="417" y1="384.9007950310559" x2="417" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9383" x1="486.5" y1="384.9007950310559" x2="486.5" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9384" x1="556" y1="384.9007950310559" x2="556" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9385" x1="625.5" y1="384.9007950310559" x2="625.5" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9386" x1="695" y1="384.9007950310559" x2="695" y2="390.9007950310559" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine9394" x1="0" y1="383.9007950310559" x2="695" y2="383.9007950310559" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine9393" x1="0" y1="1" x2="0" y2="383.9007950310559" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG9314" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG9315" class="apexcharts-series" rel="1" seriesName="online" data:realIndex="0">
                                            <path id="SvgjsPath9319" d="M10.425 383.9007950310559L10.425 383.9007950310559Q10.425 383.9007950310559 10.425 383.9007950310559L59.075 383.9007950310559Q59.075 383.9007950310559 59.075 383.9007950310559L59.075 383.9007950310559L59.075 383.9007950310559L59.075 383.9007950310559L10.425 383.9007950310559C10.425 383.9007950310559 10.425 383.9007950310559 10.425 383.9007950310559C10.425 383.9007950310559 10.424999999999997 383.9007950310559 10.424999999999997 383.9007950310559C10.424999999999997 383.9007950310559 10.424999999999997 383.9007950310559 10.424999999999997 383.9007950310559C10.424999999999997 383.9007950310559 10.424999999999997 383.9007950310559 10.424999999999997 383.9007950310559C10.424999999999997 383.9007950310559 10.424999999999997 383.9007950310559 10.424999999999997 383.9007950310559C10.424999999999997 383.9007950310559 10.424999999999997 383.9007950310559 10.424999999999997 383.9007950310559C10.424999999999997 383.9007950310559 10.425 383.9007950310559 10.425 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 10.425 383.9007950310559L 10.425 383.9007950310559Q 10.425 383.9007950310559 10.425 383.9007950310559L 59.075 383.9007950310559Q 59.075 383.9007950310559 59.075 383.9007950310559L 59.075 383.9007950310559L 59.075 383.9007950310559L 59.075 383.9007950310559z" pathFrom="M 10.425 383.9007950310559L 10.425 383.9007950310559Q 10.425 383.9007950310559 10.425 383.9007950310559L 59.075 383.9007950310559Q 59.075 383.9007950310559 59.075 383.9007950310559L 59.075 383.9007950310559L 59.075 383.9007950310559L 59.075 383.9007950310559zL 10.425 383.9007950310559L 59.075 383.9007950310559L 59.075 383.9007950310559L 59.075 383.9007950310559L 59.075 383.9007950310559L 59.075 383.9007950310559L 10.425 383.9007950310559" cy="383.9007950310559" cx="79.925" j="0" val="0" barHeight="0" barWidth="48.65"></path>
                                            <path id="SvgjsPath9321" d="M79.925 383.9007950310559L79.925 383.9007950310559Q79.925 383.9007950310559 79.925 383.9007950310559L128.575 383.9007950310559Q128.575 383.9007950310559 128.575 383.9007950310559L128.575 383.9007950310559L128.575 383.9007950310559L128.575 383.9007950310559L79.925 383.9007950310559C79.925 383.9007950310559 79.925 383.9007950310559 79.925 383.9007950310559C79.925 383.9007950310559 79.925 383.9007950310559 79.925 383.9007950310559C79.925 383.9007950310559 79.925 383.9007950310559 79.925 383.9007950310559C79.925 383.9007950310559 79.925 383.9007950310559 79.925 383.9007950310559C79.925 383.9007950310559 79.925 383.9007950310559 79.925 383.9007950310559C79.925 383.9007950310559 79.925 383.9007950310559 79.925 383.9007950310559C79.925 383.9007950310559 79.925 383.9007950310559 79.925 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 79.925 383.9007950310559L 79.925 383.9007950310559Q 79.925 383.9007950310559 79.925 383.9007950310559L 128.575 383.9007950310559Q 128.575 383.9007950310559 128.575 383.9007950310559L 128.575 383.9007950310559L 128.575 383.9007950310559L 128.575 383.9007950310559z" pathFrom="M 79.925 383.9007950310559L 79.925 383.9007950310559Q 79.925 383.9007950310559 79.925 383.9007950310559L 128.575 383.9007950310559Q 128.575 383.9007950310559 128.575 383.9007950310559L 128.575 383.9007950310559L 128.575 383.9007950310559L 128.575 383.9007950310559zL 79.925 383.9007950310559L 128.575 383.9007950310559L 128.575 383.9007950310559L 128.575 383.9007950310559L 128.575 383.9007950310559L 128.575 383.9007950310559L 79.925 383.9007950310559" cy="383.9007950310559" cx="149.425" j="1" val="0" barHeight="0" barWidth="48.65"></path>
                                            <path id="SvgjsPath9323" d="M149.425 383.9007950310559L149.425 383.9007950310559Q149.425 383.9007950310559 149.425 383.9007950310559L198.07500000000002 383.9007950310559Q198.07500000000002 383.9007950310559 198.07500000000002 383.9007950310559L198.07500000000002 383.9007950310559L198.07500000000002 383.9007950310559L198.07500000000002 383.9007950310559L149.425 383.9007950310559C149.425 383.9007950310559 149.425 383.9007950310559 149.425 383.9007950310559C149.425 383.9007950310559 149.425 383.9007950310559 149.425 383.9007950310559C149.425 383.9007950310559 149.425 383.9007950310559 149.425 383.9007950310559C149.425 383.9007950310559 149.425 383.9007950310559 149.425 383.9007950310559C149.425 383.9007950310559 149.425 383.9007950310559 149.425 383.9007950310559C149.425 383.9007950310559 149.425 383.9007950310559 149.425 383.9007950310559C149.425 383.9007950310559 149.425 383.9007950310559 149.425 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 149.425 383.9007950310559L 149.425 383.9007950310559Q 149.425 383.9007950310559 149.425 383.9007950310559L 198.07500000000002 383.9007950310559Q 198.07500000000002 383.9007950310559 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559z" pathFrom="M 149.425 383.9007950310559L 149.425 383.9007950310559Q 149.425 383.9007950310559 149.425 383.9007950310559L 198.07500000000002 383.9007950310559Q 198.07500000000002 383.9007950310559 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559zL 149.425 383.9007950310559L 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559L 198.07500000000002 383.9007950310559L 149.425 383.9007950310559" cy="383.9007950310559" cx="218.925" j="2" val="0" barHeight="0" barWidth="48.65"></path>
                                            <path id="SvgjsPath9325" d="M218.925 383.9007950310559L218.925 383.9007950310559Q218.925 383.9007950310559 218.925 383.9007950310559L267.575 383.9007950310559Q267.575 383.9007950310559 267.575 383.9007950310559L267.575 383.9007950310559L267.575 383.9007950310559L267.575 383.9007950310559L218.925 383.9007950310559C218.925 383.9007950310559 218.925 383.9007950310559 218.925 383.9007950310559C218.925 383.9007950310559 218.925 383.9007950310559 218.925 383.9007950310559C218.925 383.9007950310559 218.925 383.9007950310559 218.925 383.9007950310559C218.925 383.9007950310559 218.925 383.9007950310559 218.925 383.9007950310559C218.925 383.9007950310559 218.925 383.9007950310559 218.925 383.9007950310559C218.925 383.9007950310559 218.925 383.9007950310559 218.925 383.9007950310559C218.925 383.9007950310559 218.925 383.9007950310559 218.925 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 218.925 383.9007950310559L 218.925 383.9007950310559Q 218.925 383.9007950310559 218.925 383.9007950310559L 267.575 383.9007950310559Q 267.575 383.9007950310559 267.575 383.9007950310559L 267.575 383.9007950310559L 267.575 383.9007950310559L 267.575 383.9007950310559z" pathFrom="M 218.925 383.9007950310559L 218.925 383.9007950310559Q 218.925 383.9007950310559 218.925 383.9007950310559L 267.575 383.9007950310559Q 267.575 383.9007950310559 267.575 383.9007950310559L 267.575 383.9007950310559L 267.575 383.9007950310559L 267.575 383.9007950310559zL 218.925 383.9007950310559L 267.575 383.9007950310559L 267.575 383.9007950310559L 267.575 383.9007950310559L 267.575 383.9007950310559L 267.575 383.9007950310559L 218.925 383.9007950310559" cy="383.9007950310559" cx="288.425" j="3" val="0" barHeight="0" barWidth="48.65"></path>
                                            <path id="SvgjsPath9327" d="M288.425 383.9007950310559L288.425 383.9007950310559Q288.425 383.9007950310559 288.425 383.9007950310559L337.075 383.9007950310559Q337.075 383.9007950310559 337.075 383.9007950310559L337.075 383.9007950310559L337.075 383.9007950310559L337.075 383.9007950310559L288.425 383.9007950310559C288.425 383.9007950310559 288.425 383.9007950310559 288.425 383.9007950310559C288.425 383.9007950310559 288.425 383.9007950310559 288.425 383.9007950310559C288.425 383.9007950310559 288.425 383.9007950310559 288.425 383.9007950310559C288.425 383.9007950310559 288.425 383.9007950310559 288.425 383.9007950310559C288.425 383.9007950310559 288.425 383.9007950310559 288.425 383.9007950310559C288.425 383.9007950310559 288.425 383.9007950310559 288.425 383.9007950310559C288.425 383.9007950310559 288.425 383.9007950310559 288.425 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 288.425 383.9007950310559L 288.425 383.9007950310559Q 288.425 383.9007950310559 288.425 383.9007950310559L 337.075 383.9007950310559Q 337.075 383.9007950310559 337.075 383.9007950310559L 337.075 383.9007950310559L 337.075 383.9007950310559L 337.075 383.9007950310559z" pathFrom="M 288.425 383.9007950310559L 288.425 383.9007950310559Q 288.425 383.9007950310559 288.425 383.9007950310559L 337.075 383.9007950310559Q 337.075 383.9007950310559 337.075 383.9007950310559L 337.075 383.9007950310559L 337.075 383.9007950310559L 337.075 383.9007950310559zL 288.425 383.9007950310559L 337.075 383.9007950310559L 337.075 383.9007950310559L 337.075 383.9007950310559L 337.075 383.9007950310559L 337.075 383.9007950310559L 288.425 383.9007950310559" cy="383.9007950310559" cx="357.925" j="4" val="0" barHeight="0" barWidth="48.65"></path>
                                            <path id="SvgjsPath9329" d="M357.925 383.9007950310559L357.925 383.9007950310559Q357.925 383.9007950310559 357.925 383.9007950310559L406.575 383.9007950310559Q406.575 383.9007950310559 406.575 383.9007950310559L406.575 383.9007950310559L406.575 383.9007950310559L406.575 383.9007950310559L357.925 383.9007950310559C357.925 383.9007950310559 357.925 383.9007950310559 357.925 383.9007950310559C357.925 383.9007950310559 357.925 383.9007950310559 357.925 383.9007950310559C357.925 383.9007950310559 357.925 383.9007950310559 357.925 383.9007950310559C357.925 383.9007950310559 357.925 383.9007950310559 357.925 383.9007950310559C357.925 383.9007950310559 357.925 383.9007950310559 357.925 383.9007950310559C357.925 383.9007950310559 357.925 383.9007950310559 357.925 383.9007950310559C357.925 383.9007950310559 357.925 383.9007950310559 357.925 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 357.925 383.9007950310559L 357.925 383.9007950310559Q 357.925 383.9007950310559 357.925 383.9007950310559L 406.575 383.9007950310559Q 406.575 383.9007950310559 406.575 383.9007950310559L 406.575 383.9007950310559L 406.575 383.9007950310559L 406.575 383.9007950310559z" pathFrom="M 357.925 383.9007950310559L 357.925 383.9007950310559Q 357.925 383.9007950310559 357.925 383.9007950310559L 406.575 383.9007950310559Q 406.575 383.9007950310559 406.575 383.9007950310559L 406.575 383.9007950310559L 406.575 383.9007950310559L 406.575 383.9007950310559zL 357.925 383.9007950310559L 406.575 383.9007950310559L 406.575 383.9007950310559L 406.575 383.9007950310559L 406.575 383.9007950310559L 406.575 383.9007950310559L 357.925 383.9007950310559" cy="383.9007950310559" cx="427.425" j="5" val="0" barHeight="0" barWidth="48.65"></path>
                                            <path id="SvgjsPath9331" d="M427.425 383.9007950310559L427.425 383.9007950310559Q427.425 383.9007950310559 427.425 383.9007950310559L476.075 383.9007950310559Q476.075 383.9007950310559 476.075 383.9007950310559L476.075 383.9007950310559L476.075 383.9007950310559L476.075 383.9007950310559L427.425 383.9007950310559C427.425 383.9007950310559 427.425 383.9007950310559 427.425 383.9007950310559C427.425 383.9007950310559 427.425 383.9007950310559 427.425 383.9007950310559C427.425 383.9007950310559 427.425 383.9007950310559 427.425 383.9007950310559C427.425 383.9007950310559 427.425 383.9007950310559 427.425 383.9007950310559C427.425 383.9007950310559 427.425 383.9007950310559 427.425 383.9007950310559C427.425 383.9007950310559 427.425 383.9007950310559 427.425 383.9007950310559C427.425 383.9007950310559 427.425 383.9007950310559 427.425 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 427.425 383.9007950310559L 427.425 383.9007950310559Q 427.425 383.9007950310559 427.425 383.9007950310559L 476.075 383.9007950310559Q 476.075 383.9007950310559 476.075 383.9007950310559L 476.075 383.9007950310559L 476.075 383.9007950310559L 476.075 383.9007950310559z" pathFrom="M 427.425 383.9007950310559L 427.425 383.9007950310559Q 427.425 383.9007950310559 427.425 383.9007950310559L 476.075 383.9007950310559Q 476.075 383.9007950310559 476.075 383.9007950310559L 476.075 383.9007950310559L 476.075 383.9007950310559L 476.075 383.9007950310559zL 427.425 383.9007950310559L 476.075 383.9007950310559L 476.075 383.9007950310559L 476.075 383.9007950310559L 476.075 383.9007950310559L 476.075 383.9007950310559L 427.425 383.9007950310559" cy="383.9007950310559" cx="496.925" j="6" val="0" barHeight="0" barWidth="48.65"></path>
                                            <path id="SvgjsPath9333" d="M496.925 383.9007950310559L496.925 383.9007950310559Q496.925 383.9007950310559 496.925 383.9007950310559L545.575 383.9007950310559Q545.575 383.9007950310559 545.575 383.9007950310559L545.575 383.9007950310559L545.575 383.9007950310559L545.575 383.9007950310559L496.925 383.9007950310559C496.925 383.9007950310559 496.925 383.9007950310559 496.925 383.9007950310559C496.925 383.9007950310559 496.925 383.9007950310559 496.925 383.9007950310559C496.925 383.9007950310559 496.925 383.9007950310559 496.925 383.9007950310559C496.925 383.9007950310559 496.925 383.9007950310559 496.925 383.9007950310559C496.925 383.9007950310559 496.925 383.9007950310559 496.925 383.9007950310559C496.925 383.9007950310559 496.925 383.9007950310559 496.925 383.9007950310559C496.925 383.9007950310559 496.925 383.9007950310559 496.925 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 496.925 383.9007950310559L 496.925 383.9007950310559Q 496.925 383.9007950310559 496.925 383.9007950310559L 545.575 383.9007950310559Q 545.575 383.9007950310559 545.575 383.9007950310559L 545.575 383.9007950310559L 545.575 383.9007950310559L 545.575 383.9007950310559z" pathFrom="M 496.925 383.9007950310559L 496.925 383.9007950310559Q 496.925 383.9007950310559 496.925 383.9007950310559L 545.575 383.9007950310559Q 545.575 383.9007950310559 545.575 383.9007950310559L 545.575 383.9007950310559L 545.575 383.9007950310559L 545.575 383.9007950310559zL 496.925 383.9007950310559L 545.575 383.9007950310559L 545.575 383.9007950310559L 545.575 383.9007950310559L 545.575 383.9007950310559L 545.575 383.9007950310559L 496.925 383.9007950310559" cy="383.9007950310559" cx="566.425" j="7" val="0" barHeight="0" barWidth="48.65"></path>
                                            <path id="SvgjsPath9335" d="M566.425 383.9007950310559L566.425 0Q566.425 0 566.425 0L615.0749999999999 0Q615.0749999999999 0 615.0749999999999 0L615.0749999999999 0L615.0749999999999 383.9007950310559L615.0749999999999 383.9007950310559L566.425 383.9007950310559C566.425 383.9007950310559 566.425 383.9007950310559 566.425 383.9007950310559C566.425 383.9007950310559 566.425 383.9007950310559 566.425 383.9007950310559C566.425 383.9007950310559 566.425 383.9007950310559 566.425 383.9007950310559C566.425 383.9007950310559 566.425 383.9007950310559 566.425 383.9007950310559C566.425 383.9007950310559 566.425 383.9007950310559 566.425 383.9007950310559C566.425 383.9007950310559 566.425 383.9007950310559 566.425 383.9007950310559C566.425 383.9007950310559 566.425 383.9007950310559 566.425 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 566.425 383.9007950310559L 566.425 0Q 566.425 0 566.425 0L 615.0749999999999 0Q 615.0749999999999 0 615.0749999999999 0L 615.0749999999999 0L 615.0749999999999 383.9007950310559L 615.0749999999999 383.9007950310559z" pathFrom="M 566.425 383.9007950310559L 566.425 0Q 566.425 0 566.425 0L 615.0749999999999 0Q 615.0749999999999 0 615.0749999999999 0L 615.0749999999999 0L 615.0749999999999 383.9007950310559L 615.0749999999999 383.9007950310559zL 566.425 383.9007950310559L 615.0749999999999 383.9007950310559L 615.0749999999999 383.9007950310559L 615.0749999999999 383.9007950310559L 615.0749999999999 383.9007950310559L 615.0749999999999 383.9007950310559L 566.425 383.9007950310559" cy="0" cx="635.925" j="8" val="1" barHeight="383.9007950310559" barWidth="48.65"></path>
                                            <path id="SvgjsPath9337" d="M635.925 383.9007950310559L635.925 0Q635.925 0 635.925 0L684.5749999999999 0Q684.5749999999999 0 684.5749999999999 0L684.5749999999999 0L684.5749999999999 383.9007950310559L684.5749999999999 383.9007950310559L635.925 383.9007950310559C635.925 383.9007950310559 635.925 383.9007950310559 635.925 383.9007950310559C635.925 383.9007950310559 635.925 383.9007950310559 635.925 383.9007950310559C635.925 383.9007950310559 635.925 383.9007950310559 635.925 383.9007950310559C635.925 383.9007950310559 635.925 383.9007950310559 635.925 383.9007950310559C635.925 383.9007950310559 635.925 383.9007950310559 635.925 383.9007950310559C635.925 383.9007950310559 635.925 383.9007950310559 635.925 383.9007950310559C635.925 383.9007950310559 635.925 383.9007950310559 635.925 383.9007950310559 " fill="rgba(90,136,175,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask9x8f8eve)" pathTo="M 635.925 383.9007950310559L 635.925 0Q 635.925 0 635.925 0L 684.5749999999999 0Q 684.5749999999999 0 684.5749999999999 0L 684.5749999999999 0L 684.5749999999999 383.9007950310559L 684.5749999999999 383.9007950310559z" pathFrom="M 635.925 383.9007950310559L 635.925 0Q 635.925 0 635.925 0L 684.5749999999999 0Q 684.5749999999999 0 684.5749999999999 0L 684.5749999999999 0L 684.5749999999999 383.9007950310559L 684.5749999999999 383.9007950310559zL 635.925 383.9007950310559L 684.5749999999999 383.9007950310559L 684.5749999999999 383.9007950310559L 684.5749999999999 383.9007950310559L 684.5749999999999 383.9007950310559L 684.5749999999999 383.9007950310559L 635.925 383.9007950310559" cy="0" cx="705.425" j="9" val="1" barHeight="383.9007950310559" barWidth="48.65"></path>
                                            <g id="SvgjsG9317" class="apexcharts-bar-goals-markers" style="pointer-events: none">
                                                <g id="SvgjsG9318" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG9320" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG9322" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG9324" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG9326" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG9328" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG9330" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG9332" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG9334" className="apexcharts-bar-goals-groups"></g>
                                                <g id="SvgjsG9336" className="apexcharts-bar-goals-groups"></g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG9316" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine9395" x1="0" y1="0" x2="695" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine9396" x1="0" y1="0" x2="695" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG9397" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG9398" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG9399" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG9371" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)">
                                    <g id="SvgjsG9372" class="apexcharts-yaxis-texts-g"></g>
                                </g>
                                <g id="SvgjsG9305" class="apexcharts-annotations"></g>
                            </svg> --}}
                            <div class="apexcharts-legend" style="max-height: 225.776px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                    <span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group">
                                            <span class="apexcharts-tooltip-text-y-label"></span>
                                            <span class="apexcharts-tooltip-text-y-value"></span>
                                        </div>
                                        <div class="apexcharts-tooltip-goals-group">
                                            <span class="apexcharts-tooltip-text-goals-label"></span>
                                            <span class="apexcharts-tooltip-text-goals-value"></span>
                                        </div>
                                        <div class="apexcharts-tooltip-z-group">
                                            <span class="apexcharts-tooltip-text-z-label"></span>
                                            <span class="apexcharts-tooltip-text-z-value"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
            </div>
        </div>
        <div class="Right" data-v-9eb481e8="">
            {{-- <div class="Card" data-v-51c4eddc="" data-v-9eb481e8="">
                <!---->
                <div class="Card-Title">
                    <div class="Card-Header" data-v-51c4eddc="">
                        <div class="title" data-v-51c4eddc="">Популярні товари</div>
                        <!---->
                    </div>
                </div>
                <div class="Card-Content">
                    <section class="Flex-Table Items-Table Cols-3" data-v-51c4eddc="">
                        <header data-v-51c4eddc="">
                            <div class="Table-Col" data-v-51c4eddc="">Товар</div>
                            <div class="Table-Col" data-v-51c4eddc="">Переглядів</div>
                        </header>
                        <div class="Table-Row" data-v-51c4eddc="">
                            <div class="Table-Col" data-v-51c4eddc="">
                                <div class="Item-Info" data-v-51c4eddc="">
                                    <div class="Item-Image" data-v-51c4eddc="">
                                        <img alt="Яєшня з домашніх яєць" src="https://shakal.storinka.menu/images/dishes/2902/fzoEenb2fe8brrcxDinpo3oqF5ggpKmRa0oxUnRI.jpg?s=50" data-v-51c4eddc="">
                                    </div>
                                    <span class="Item-Title" data-v-51c4eddc="">Яєшня з домашніх яєць</span>
                                </div>
                            </div>
                            <div class="Table-Col" data-v-51c4eddc="">1</div>
                        </div>
                        <div class="Table-Row" data-v-51c4eddc="">
                            <div class="Table-Col" data-v-51c4eddc="">
                                <div class="Item-Info" data-v-51c4eddc="">
                                    <div class="Item-Image" data-v-51c4eddc="">
                                        <img alt="Вареники" src="https://shakal.storinka.menu/images/dishes/2906/TTrAq17Umzz7M8c0F6h4kIGqkKRZpwbAiuEgGlel.jpg?s=50" data-v-51c4eddc="">
                                    </div>
                                    <span class="Item-Title" data-v-51c4eddc="">Вареники</span>
                                </div>
                            </div>
                            <div class="Table-Col" data-v-51c4eddc="">1</div>
                        </div>
                        <div class="Table-Row" data-v-51c4eddc="">
                            <div class="Table-Col" data-v-51c4eddc="">
                                <div class="Item-Info" data-v-51c4eddc="">
                                    <div class="Item-Image" data-v-51c4eddc="">
                                        <img alt="Філе лосося приготоване на парі" src="https://shakal.storinka.menu/images/dishes/2914/kitnLYRE7BMcG5BYnIdIwmfDj77NREtivPdsDH5k.jpg?s=50" data-v-51c4eddc="">
                                    </div>
                                    <span class="Item-Title" data-v-51c4eddc="">Філе лосося приготоване на парі</span>
                                </div>
                            </div>
                            <div class="Table-Col" data-v-51c4eddc="">1</div>
                        </div>
                        <!---->
                    </section>
                </div>
                <!---->
            </div> --}}
        </div>
    </div>
</div>
@endsection