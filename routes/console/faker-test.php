<?php


Artisan::command('fakes', function()
{

$res = fake()->citySuffix();

$res = fake()->streetSuffix();

$res = fake()->buildingNumber();

$res = fake()->city();

$res = fake()->streetName();

$res = fake()->streetAddress();

$res = fake()->postcode();

$res = fake()->address();

$res = fake()->country();

$res = fake()->latitude($min = -90, $max = 90);

$res = fake()->longitude($min = -180, $max = 180);

$res = fake()->localCoordinates();

$res = fake()->randomDigitNotNull();

$res = fake()->randomLetter();

$res = fake()->randomAscii();

$res = fake()->randomElements($array = ['a', 'b', 'c'], $count = 1, $allowDuplicates = false);

$res = fake()->randomElement($array = ['a', 'b', 'c']);

$res = fake()->randomKey($array = []);

$res = fake()->shuffle($arg = '');

$res = fake()->shuffleArray($array = []);

$res = fake()->shuffleString('', $encoding = 'UTF-8');

$res = fake()->numerify('###');

$res = fake()->lexify('????');

$res = fake()->bothify('## ??');

$res = fake()->asciify('****');

$res = fake()->regexify($regex = '');

$res = fake()->toLower('');

$res = fake()->toUpper('');

$res = fake()->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt');

$res = fake()->hexColor();

$res = fake()->safeHexColor();

$res = fake()->rgbColorAsArray();

$res = fake()->rgbColor();

$res = fake()->rgbCssColor();

$res = fake()->rgbaCssColor();

$res = fake()->safeColorName();

$res = fake()->colorName();

$res = fake()->hslColor();

$res = fake()->hslColorAsArray();

$res = fake()->company();

$res = fake()->companySuffix();

$res = fake()->jobTitle();

$res = fake()->unixTime($max = 'now');

$res = fake()->dateTime($max = 'now', $timezone = null);

$res = fake()->dateTimeAD($max = 'now', $timezone = null);

$res = fake()->iso8601($max = 'now');

$res = fake()->date($format = 'Y-m-d', $max = 'now');

$res = fake()->time($format = 'H:i:s', $max = 'now');

$res = fake()->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null);

$res = fake()->dateTimeInInterval($date = '-30 years', $interval = '+5 days', $timezone = null);

$res = fake()->dateTimeThisCentury($max = 'now', $timezone = null);

$res = fake()->dateTimeThisDecade($max = 'now', $timezone = null);

$res = fake()->dateTimeThisYear($max = 'now', $timezone = null);

$res = fake()->dateTimeThisMonth($max = 'now', $timezone = null);

$res = fake()->amPm($max = 'now');

$res = fake()->dayOfMonth($max = 'now');

$res = fake()->dayOfWeek($max = 'now');

$res = fake()->month($max = 'now');

$res = fake()->monthName($max = 'now');

$res = fake()->year($max = 'now');

$res = fake()->century();

$res = fake()->timezone($countryCode = null);

$res = fake()->setDefaultTimezone($timezone = null);

$res = fake()->getDefaultTimezone();

$res = fake()->randomHtml($maxDepth = 4, $maxWidth = 4);

$res = fake()->imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false);

$res = fake()->image($dir = null, $width = 640, $height = 480, $category = null, $fullPath = true, $randomize = true, $word = null, $gray = false);

$res = fake()->email();

$res = fake()->safeEmail();

$res = fake()->freeEmail();

$res = fake()->companyEmail();

$res = fake()->freeEmailDomain();

$res = fake()->safeEmailDomain();

$res = fake()->userName();

$res = fake()->password($minLength = 6, $maxLength = 20);

$res = fake()->domainName();

$res = fake()->domainWord();

$res = fake()->tld();

$res = fake()->url();

$res = fake()->slug($nbWords = 6, $variableNbWords = true);

$res = fake()->ipv4();

$res = fake()->ipv6();

$res = fake()->localIpv4();

$res = fake()->macAddress();

$res = fake()->word();

$res = fake()->words($nb = 3, $asText = false);

$res = fake()->sentence($nbWords = 6, $variableNbWords = true);

$res = fake()->sentences($nb = 3, $asText = false);

$res = fake()->paragraph($nbSentences = 3, $variableNbSentences = true);

$res = fake()->paragraphs($nb = 3, $asText = false);

$res = fake()->text($maxNbChars = 200);

$res = fake()->boolean($chanceOfGettingTrue = 50);

$res = fake()->md5();

$res = fake()->sha1();

$res = fake()->sha256();

$res = fake()->locale();

$res = fake()->countryCode();

$res = fake()->countryISOAlpha3();

$res = fake()->languageCode();

$res = fake()->currencyCode();

$res = fake()->emoji();

$res = fake()->creditCardType();

$res = fake()->creditCardNumber($type = null, $formatted = false, $separator = '-');

$res = fake()->creditCardExpirationDate($valid = true);

$res = fake()->creditCardExpirationDateString($valid = true, $expirationDateFormat = null);

$res = fake()->creditCardDetails($valid = true);

$res = fake()->iban($countryCode = null, $prefix = '', $length = null);

$res = fake()->swiftBicNumber();

$res = fake()->name($gender = null);

$res = fake()->firstName($gender = null);

$res = fake()->firstNameMale();

$res = fake()->firstNameFemale();

$res = fake()->lastName();

$res = fake()->title($gender = null);

$res = fake()->titleMale();

$res = fake()->titleFemale();

$res = fake()->phoneNumber();

$res = fake()->e164PhoneNumber();

$res = fake()->imei();

$res = fake()->realText($maxNbChars = 200, $indexSize = 2);

$res = fake()->realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2);

$res = fake()->macProcessor();

$res = fake()->linuxProcessor();

$res = fake()->userAgent();

$res = fake()->chrome();

$res = fake()->msedge();

$res = fake()->firefox();

$res = fake()->safari();

$res = fake()->opera();

$res = fake()->internetExplorer();

$res = fake()->windowsPlatformToken();

$res = fake()->macPlatformToken();

$res = fake()->iosMobileToken();

$res = fake()->linuxPlatformToken();

$res = fake()->uuid();


});