<?php


Artisan::command('fakes', function()
{

$res = fake()->citySuffix();
echo('--------- citySuffix ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->streetSuffix();
echo('--------- streetSuffix ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->buildingNumber();
echo('--------- buildingNumber ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->city();
echo('--------- city ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->streetName();
echo('--------- streetName ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->streetAddress();
echo('--------- streetAddress ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->postcode();
echo('--------- postcode ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->address();
echo('--------- address ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->country();
echo('--------- country ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->latitude($min = -90, $max = 90);
echo('--------- latitude ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->longitude($min = -180, $max = 180);
echo('--------- longitude ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->localCoordinates();
echo('--------- localCoordinates ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->randomDigitNotNull();
echo('--------- randomDigitNotNull ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->randomLetter();
echo('--------- randomLetter ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->randomAscii();
echo('--------- randomAscii ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->randomElements($array = ['a', 'b', 'c'], $count = 1, $allowDuplicates = false);
echo('--------- randomElements ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->randomElement($array = ['a', 'b', 'c']);
echo('--------- randomElement ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->randomKey($array = []);
echo('--------- randomKey ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->shuffle($arg = '');
echo('--------- shuffle ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->shuffleArray($array = []);
echo('--------- shuffleArray ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->shuffleString('', $encoding = 'UTF-8');
echo('--------- shuffleString ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->numerify('###');
echo('--------- numerify ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->lexify('????');
echo('--------- lexify ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->bothify('## ??');
echo('--------- bothify ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->asciify('****');
echo('--------- asciify ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->regexify($regex = '');
echo('--------- regexify ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->toLower('');
echo('--------- toLower ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->toUpper('');
echo('--------- toUpper ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt');
echo('--------- biasedNumberBetween ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->hexColor();
echo('--------- hexColor ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->safeHexColor();
echo('--------- safeHexColor ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->rgbColorAsArray();
echo('--------- rgbColorAsArray ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->rgbColor();
echo('--------- rgbColor ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->rgbCssColor();
echo('--------- rgbCssColor ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->rgbaCssColor();
echo('--------- rgbaCssColor ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->safeColorName();
echo('--------- safeColorName ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->colorName();
echo('--------- colorName ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->hslColor();
echo('--------- hslColor ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->hslColorAsArray();
echo('--------- hslColorAsArray ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->company();
echo('--------- company ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->companySuffix();
echo('--------- companySuffix ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->jobTitle();
echo('--------- jobTitle ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->unixTime($max = 'now');
echo('--------- unixTime ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dateTime($max = 'now', $timezone = null);
echo('--------- dateTime ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dateTimeAD($max = 'now', $timezone = null);
echo('--------- dateTimeAD ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->iso8601($max = 'now');
echo('--------- iso8601 ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->date($format = 'Y-m-d', $max = 'now');
echo('--------- date ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->time($format = 'H:i:s', $max = 'now');
echo('--------- time ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null);
echo('--------- dateTimeBetween ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dateTimeInInterval($date = '-30 years', $interval = '+5 days', $timezone = null);
echo('--------- dateTimeInInterval ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dateTimeThisCentury($max = 'now', $timezone = null);
echo('--------- dateTimeThisCentury ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dateTimeThisDecade($max = 'now', $timezone = null);
echo('--------- dateTimeThisDecade ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dateTimeThisYear($max = 'now', $timezone = null);
echo('--------- dateTimeThisYear ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dateTimeThisMonth($max = 'now', $timezone = null);
echo('--------- dateTimeThisMonth ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->amPm($max = 'now');
echo('--------- amPm ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dayOfMonth($max = 'now');
echo('--------- dayOfMonth ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->dayOfWeek($max = 'now');
echo('--------- dayOfWeek ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->month($max = 'now');
echo('--------- month ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->monthName($max = 'now');
echo('--------- monthName ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->year($max = 'now');
echo('--------- year ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->century();
echo('--------- century ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->timezone($countryCode = null);
echo('--------- timezone ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->setDefaultTimezone($timezone = null);
echo('--------- setDefaultTimezone ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->getDefaultTimezone();
echo('--------- getDefaultTimezone ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->randomHtml($maxDepth = 4, $maxWidth = 4);
echo('--------- randomHtml ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false);
echo('--------- imageUrl ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->image($dir = null, $width = 640, $height = 480, $category = null, $fullPath = true, $randomize = true, $word = null, $gray = false);
echo('--------- image ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->email();
echo('--------- email ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->safeEmail();
echo('--------- safeEmail ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->freeEmail();
echo('--------- freeEmail ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->companyEmail();
echo('--------- companyEmail ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->freeEmailDomain();
echo('--------- freeEmailDomain ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->safeEmailDomain();
echo('--------- safeEmailDomain ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->userName();
echo('--------- userName ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->password($minLength = 6, $maxLength = 20);
echo('--------- password ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->domainName();
echo('--------- domainName ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->domainWord();
echo('--------- domainWord ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->tld();
echo('--------- tld ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->url();
echo('--------- url ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->slug($nbWords = 6, $variableNbWords = true);
echo('--------- slug ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->ipv4();
echo('--------- ipv4 ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->ipv6();
echo('--------- ipv6 ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->localIpv4();
echo('--------- localIpv4 ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->macAddress();
echo('--------- macAddress ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->word();
echo('--------- word ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->words($nb = 3, $asText = false);
echo('--------- words ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->sentence($nbWords = 6, $variableNbWords = true);
echo('--------- sentence ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->sentences($nb = 3, $asText = false);
echo('--------- sentences ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->paragraph($nbSentences = 3, $variableNbSentences = true);
echo('--------- paragraph ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->paragraphs($nb = 3, $asText = false);
echo('--------- paragraphs ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->text($maxNbChars = 200);
echo('--------- text ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->boolean($chanceOfGettingTrue = 50);
echo('--------- boolean ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->md5();
echo('--------- md5 ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->sha1();
echo('--------- sha1 ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->sha256();
echo('--------- sha256 ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->locale();
echo('--------- locale ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->countryCode();
echo('--------- countryCode ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->countryISOAlpha3();
echo('--------- countryISOAlpha3 ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->languageCode();
echo('--------- languageCode ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->currencyCode();
echo('--------- currencyCode ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->emoji();
echo('--------- emoji ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->creditCardType();
echo('--------- creditCardType ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->creditCardNumber($type = null, $formatted = false, $separator = '-');
echo('--------- creditCardNumber ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->creditCardExpirationDate($valid = true);
echo('--------- creditCardExpirationDate ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->creditCardExpirationDateString($valid = true, $expirationDateFormat = null);
echo('--------- creditCardExpirationDateString ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->creditCardDetails($valid = true);
echo('--------- creditCardDetails ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->iban($countryCode = null, $prefix = '', $length = null);
echo('--------- iban ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->swiftBicNumber();
echo('--------- swiftBicNumber ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->name($gender = null);
echo('--------- name ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->firstName($gender = null);
echo('--------- firstName ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->firstNameMale();
echo('--------- firstNameMale ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->firstNameFemale();
echo('--------- firstNameFemale ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->lastName();
echo('--------- lastName ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->title($gender = null);
echo('--------- title ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->titleMale();
echo('--------- titleMale ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->titleFemale();
echo('--------- titleFemale ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->phoneNumber();
echo('--------- phoneNumber ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->e164PhoneNumber();
echo('--------- e164PhoneNumber ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->imei();
echo('--------- imei ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->realText($maxNbChars = 200, $indexSize = 2);
echo('--------- realText ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2);
echo('--------- realTextBetween ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->macProcessor();
echo('--------- macProcessor ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->linuxProcessor();
echo('--------- linuxProcessor ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->userAgent();
echo('--------- userAgent ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->chrome();
echo('--------- chrome ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->msedge();
echo('--------- msedge ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->firefox();
echo('--------- firefox ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->safari();
echo('--------- safari ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->opera();
echo('--------- opera ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->internetExplorer();
echo('--------- internetExplorer ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->windowsPlatformToken();
echo('--------- windowsPlatformToken ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->macPlatformToken();
echo('--------- macPlatformToken ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->iosMobileToken();
echo('--------- iosMobileToken ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->linuxPlatformToken();
echo('--------- linuxPlatformToken ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;

$res = fake()->uuid();
echo('--------- uuid ----------------------------------------- ');
echo PHP_EOL;
dump($res);
echo PHP_EOL;


});