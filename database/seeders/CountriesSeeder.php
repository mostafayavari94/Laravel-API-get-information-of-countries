<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();

        $countries = array(
            array( 'name' => 'Afghanistan','population' => 38041754),
            array( 'name' => 'Albania','population' => 2880917),
            array( 'name' => 'Algeria','population' => 43053054),
            array( 'name' => 'American Samoa','population' => 55312),
            array( 'name' => 'Andorra','population' => 77142),
            array( 'name' => 'Angola','population' => 31825295),
            array( 'name' => 'Anguilla','population' => 14869),
            array( 'name' => 'Antigua and Barbuda','population' => 97118),
            array( 'name' => 'Argentina','population' => 44780677),
            array( 'name' => 'Armenia','population' => 2957731),
            array( 'name' => 'Aruba','population' => 106314),
            array( 'name' => 'Australia','population' => 25203198),
            array( 'name' => 'Austria','population' => 8955102),
            array( 'name' => 'Azerbaijan','population' => 10047718),
            array( 'name' => 'Bahamas','population' => 389482),
            array( 'name' => 'Bahrain','population' => 1641172),
            array( 'name' => 'Bangladesh','population' => 163046161),
            array( 'name' => 'Barbados','population' => 287025),
            array( 'name' => 'Belarus','population' => 9452411),
            array( 'name' => 'Belgium','population' => 11539328),
            array( 'name' => 'Belize','population' => 390353),
            array( 'name' => 'Benin','population' => 11801151),
            array( 'name' => 'Bermuda','population' => 62506),
            array( 'name' => 'Bhutan','population' => 763092),
            array( 'name' => 'Bolivia','population' => 11513100),
            array( 'name' => 'Bosnia and Herzegovina','population' => 3301000),
            array( 'name' => 'Botswana','population' => 2303697),
            array( 'name' => 'Brazil','population' => 211049527),
            array( 'name' => 'British Virgin Islands','population' => 30030),
            array( 'name' => 'Brunei','population' => 433285),
            array( 'name' => 'Bulgaria','population' => 7000119),
            array( 'name' => 'Burkina Faso','population' => 20321378),
            array( 'name' => 'Burundi','population' => 10864245),
            array( 'name' => 'Cambodia','population' => 16486542),
            array( 'name' => 'Cameroon','population' => 25876380),
            array( 'name' => 'Canada','population' => 37411047),
            array( 'name' => 'Cape Verde','population' => 549935),
            array( 'name' => 'Caribbean Netherlands','population' => 25979),
            array( 'name' => 'Cayman Islands','population' => 64948),
            array( 'name' => 'Central African Republic','population' => 4745185),
            array( 'name' => 'Chad','population' => 15946876),
            array( 'name' => 'Channel Islands','population' => 172259),
            array( 'name' => 'United Kingdom','population' => 18952038),
            array( 'name' => 'Chile','population' => 1433783686),
            array( 'name' => 'China','population' => 50339443),
            array( 'name' => 'Colombia','population' => 850886),
            array( 'name' => 'Comoros','population' => 5380508),
            array( 'name' => 'Congo','population' => 17548),
            array( 'name' => 'Cook Islands','population' => 5047561),
            array( 'name' => 'Costa Rica','population' => 4130304),
            array( 'name' => 'Croatia','population' => 11333483),
            array( 'name' => 'Cuba','population' => 163424),
            array( 'name' => 'Curaçao','population' => 1179551),
            array( 'name' => 'Cyprus','population' => 10689209),
            array( 'name' => 'Czechia','population' => 5771876),
            array( 'name' => 'Denmark','population' => 973560),
            array( 'name' => 'Djibouti','population' => 71808),
            array( 'name' => 'Dominica','population' => 10738958),
            array( 'name' => 'Dominican Republic','population' => 86790567),
            array( 'name' => 'DR Congo','population' => 1293119),
            array( 'name' => 'East Timor','population' => 17373662),
            array( 'name' => 'Ecuador','population' => 100388073),
            array( 'name' => 'Egypt','population' => 6453553),
            array( 'name' => 'El Salvador','population' => 1355986),
            array( 'name' => 'Equatorial Guinea','population' => 3497117),
            array( 'name' => 'Eritrea','population' => 1325648),
            array( 'name' => 'Estonia','population' => 1148130),
            array( 'name' => 'Eswatini','population' => 112078730),
            array( 'name' => 'Ethiopia','population' => 3377),
            array( 'name' => 'Falkland Islands','population' => 48678),
            array( 'name' => 'Faroe Islands','population' => 889953),
            array( 'name' => 'Fiji','population' => 5532156),
            array( 'name' => 'Finland','population' => 65129728),
            array( 'name' => 'France','population' => 282731),
            array( 'name' => 'French Guiana','population' => 279287),
            array( 'name' => 'French Polynesia','population' => 2172579),
            array( 'name' => 'Gabon','population' => 2347706),
            array( 'name' => 'Gambia','population' => 3996765),
            array( 'name' => 'Georgia','population' => 83517045),
            array( 'name' => 'Germany','population' => 28833629),
            array( 'name' => 'Ghana','population' => 33701),
            array( 'name' => 'Gibraltar','population' => 67530172),
            array( 'name' => 'United Kingdom','population' => 10473455),
            array( 'name' => 'Greece','population' => 56672),
            array( 'name' => 'Greenland','population' => 112003),
            array( 'name' => 'Grenada','population' => 447905),
            array( 'name' => 'Guadeloupe','population' => 167294),
            array( 'name' => 'Guam','population' => 17581472),
            array( 'name' => 'Guatemala','population' => 12771246),
            array( 'name' => 'Guinea','population' => 1920922),
            array( 'name' => 'Guinea-Bissau','population' => 782766),
            array( 'name' => 'Guyana','population' => 11263770),
            array( 'name' => 'Haiti','population' => 9746117),
            array( 'name' => 'Honduras','population' => 7436154),
            array( 'name' => 'Hong Kong','population' => 9684679),
            array( 'name' => 'Hungary','population' => 339031),
            array( 'name' => 'Iceland','population' => 1366417754),
            array( 'name' => 'India','population' => 270625568),
            array( 'name' => 'Indonesia','population' => 82913906),
            array( 'name' => 'Iran','population' => 39309783),
            array( 'name' => 'Iraq','population' => 4882495),
            array( 'name' => 'Ireland','population' => 84584),
            array( 'name' => 'Isle of Man','population' => 8519377),
            array( 'name' => 'Israel','population' => 60550075),
            array( 'name' => 'Italy','population' => 25716544),
            array( 'name' => 'Ivory Coast','population' => 2948279),
            array( 'name' => 'Jamaica','population' => 126860301),
            array( 'name' => 'Japan','population' => 10101694),
            array( 'name' => 'Jordan','population' => 18551427),
            array( 'name' => 'Kazakhstan','population' => 52573973),
            array( 'name' => 'Kenya','population' => 117606),
            array( 'name' => 'Kiribati','population' => 4207083),
            array( 'name' => 'Kuwait','population' => 6415850),
            array( 'name' => 'Kyrgyzstan','population' => 7169455),
            array( 'name' => 'Laos','population' => 1906743),
            array( 'name' => 'Latvia','population' => 6855713),
            array( 'name' => 'Lebanon','population' => 2125268),
            array( 'name' => 'Lesotho','population' => 4937374),
            array( 'name' => 'Liberia','population' => 6777452),
            array( 'name' => 'Libya','population' => 38019),
            array( 'name' => 'Liechtenstein','population' => 2759627),
            array( 'name' => 'Lithuania','population' => 615729),
            array( 'name' => 'Luxembourg','population' => 640445),
            array( 'name' => 'Macao','population' => 26969307),
            array( 'name' => 'Madagascar','population' => 18628747),
            array( 'name' => 'Malawi','population' => 31949777),
            array( 'name' => 'Malaysia','population' => 530953),
            array( 'name' => 'Maldives','population' => 19658031),
            array( 'name' => 'Mali','population' => 440372),
            array( 'name' => 'Malta','population' => 58791),
            array( 'name' => 'Marshall Islands','population' => 375554),
            array( 'name' => 'Martinique','population' => 4525696),
            array( 'name' => 'Mauritania','population' => 1198575),
            array( 'name' => 'Mauritius','population' => 266150),
            array( 'name' => 'Mayotte','population' => 127575529),
            array( 'name' => 'Mexico','population' => 113815),
            array( 'name' => 'Micronesia','population' => 4043263),
            array( 'name' => 'Moldova','population' => 38964),
            array( 'name' => 'Monaco','population' => 3225167),
            array( 'name' => 'Mongolia','population' => 627987),
            array( 'name' => 'Montenegro','population' => 4989),
            array( 'name' => 'Montserrat','population' => 36471769),
            array( 'name' => 'Morocco','population' => 30366036),
            array( 'name' => 'Mozambique','population' => 54045420),
            array( 'name' => 'Myanmar','population' => 2494530),
            array( 'name' => 'Namibia','population' => 10756),
            array( 'name' => 'Nauru','population' => 28608710),
            array( 'name' => 'Nepal','population' => 17097130),
            array( 'name' => 'Netherlands','population' => 282750),
            array( 'name' => 'New Caledonia','population' => 4783063),
            array( 'name' => 'New Zealand','population' => 6545502),
            array( 'name' => 'Nicaragua','population' => 23310715),
            array( 'name' => 'Niger','population' => 200963599),
            array( 'name' => 'Nigeria','population' => 1615),
            array( 'name' => 'Niue','population' => 25666161),
            array( 'name' => 'North Korea','population' => 2083459),
            array( 'name' => 'North Macedonia','population' => 56188),
            array( 'name' => 'Northern Mariana Islands','population' => 5378857),
            array( 'name' => 'Norway','population' => 4974986),
            array( 'name' => 'Oman','population' => 216565318),
            array( 'name' => 'Pakistan','population' => 18008),
            array( 'name' => 'Palau','population' => 4981420),
            array( 'name' => 'Palestine','population' => 4246439),
            array( 'name' => 'Panama','population' => 8776109),
            array( 'name' => 'Papua New Guinea','population' => 7044636),
            array( 'name' => 'Paraguay','population' => 32510453),
            array( 'name' => 'Peru','population' => 108116615),
            array( 'name' => 'Philippines','population' => 37887768),
            array( 'name' => 'Poland','population' => 10226187),
            array( 'name' => 'Portugal','population' => 2933408),
            array( 'name' => 'Puerto Rico','population' => 2832067),
            array( 'name' => 'Qatar','population' => 888927),
            array( 'name' => 'Réunion','population' => 19364557),
            array( 'name' => 'Romania','population' => 145872256),
            array( 'name' => 'Russia','population' => 12626950),
            array( 'name' => 'Rwanda','population' => 6059),
            array( 'name' => 'Saint Helena','population' => 52823),
            array( 'name' => 'Saint Kitts and Nevis','population' => 182790),
            array( 'name' => 'Saint Lucia','population' => 5822),
            array( 'name' => 'Saint Pierre and Miquelon','population' => 110589),
            array( 'name' => 'Saint Vincent and the Grenadines','population' => 197097),
            array( 'name' => 'Samoa','population' => 33860),
            array( 'name' => 'San Marino','population' => 215056),
            array( 'name' => 'São Tomé and Príncipe','population' => 34268528),
            array( 'name' => 'Saudi Arabia','population' => 16296364),
            array( 'name' => 'Senegal','population' => 8772235),
            array( 'name' => 'Serbia','population' => 97739),
            array( 'name' => 'Seychelles','population' => 7813215),
            array( 'name' => 'Sierra Leone','population' => 5804337),
            array( 'name' => 'Singapore','population' => 42388),
            array( 'name' => 'Sint Maarten','population' => 5457013),
            array( 'name' => 'Slovakia','population' => 2078654),
            array( 'name' => 'Slovenia','population' => 669823),
            array( 'name' => 'Solomon Islands','population' => 15442905),
            array( 'name' => 'Somalia','population' => 58558270),
            array( 'name' => 'South Africa','population' => 51225308),
            array( 'name' => 'South Korea','population' => 11062113),
            array( 'name' => 'South Sudan','population' => 46736776),
            array( 'name' => 'Spain','population' => 21323733),
            array( 'name' => 'Sri Lanka','population' => 42813238),
            array( 'name' => 'Sudan','population' => 581372),
            array( 'name' => 'Suriname','population' => 10036379),
            array( 'name' => 'Sweden','population' => 8591365),
            array( 'name' => 'Switzerland','population' => 17070135),
            array( 'name' => 'Syria','population' => 23773876),
            array( 'name' => 'Taiwan','population' => 9321018),
            array( 'name' => 'Tajikistan','population' => 58005463),
            array( 'name' => 'Tanzania','population' => 69037513),
            array( 'name' => 'Thailand','population' => 8082366),
            array( 'name' => 'Togo','population' => 1340),
            array( 'name' => 'Tokelau','population' => 110940),
            array( 'name' => 'Tonga','population' => 1394973),
            array( 'name' => 'Trinidad and Tobago','population' => 11694719),
            array( 'name' => 'Tunisia','population' => 83429615),
            array( 'name' => 'Turkey','population' => 5942089),
            array( 'name' => 'Turkmenistan','population' => 38191),
            array( 'name' => 'Turks and Caicos Islands','population' => 11646),
            array( 'name' => 'Tuvalu','population' => 104578),
            array( 'name' => 'U.S. Virgin Islands','population' => 44269594),
            array( 'name' => 'Uganda','population' => 43993638),
            array( 'name' => 'Ukraine','population' => 9770529),
            array( 'name' => 'United Arab Emirates','population' => 329064917),
            array( 'name' => 'United States','population' => 3461734),
            array( 'name' => 'Uruguay','population' => 32981716),
            array( 'name' => 'Uzbekistan','population' => 299882),
            array( 'name' => 'Vanuatu','population' => 799),
            array( 'name' => 'Vatican City','population' => 28515829),
            array( 'name' => 'Venezuela','population' => 96462106),
            array( 'name' => 'Vietnam','population' => 11432),
            array( 'name' => 'Wallis and Futuna','population' => 582463),
            array( 'name' => 'Yemen','population' => 29161922),
            array( 'name' => 'Zambia','population' => 17861030),
            array( 'name' => 'Zimbabwe','population' => 14645468),
            );

        DB::table('countries')->insert($countries);
    }
}
