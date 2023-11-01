<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoadNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('road_names')->insert([
            [
                'name' => 'Vadodara - Padra - Jambusar S.H. No. 6 Km. 8/4 to 43/8)',
                'chainage_from' => '8/4',
                'chainage_to' => '43/8',
                'total_length' => '35.40',
                'cat' => 'SH',
                'sub_division' => 'No.1',
            ],
            [
                'name' => '(Mujpur Approach Road) (0/0 to 4/1)',
                'chainage_from' => '0/0',
                'chainage_to' => '4/1',
                'total_length' => '4.10 ',
                'cat' => 'SH',
                'sub_division' => 'No.1',
            ],


            [
                'name' => 'Vadodara - Dabhoi Road',
                'chainage_from' => '8/3',
                'chainage_to' => '31/0',
                'total_length' => '22.70 ',
                'cat' => 'SH',
                'sub_division' => 'No.1',
            ],

            [
                'name' => ' Borsad - Umeta - Singhrot - Gotri - Vadodara -  Dabhoi - Bodeli - Chhotaudepur - Alirajpur up to  State Border S.H. No.11  (Dabhoi Bodeli Road)',
                'chainage_from' => '29/8',
                'chainage_to' => '45/0',
                'total_length' => '15.20',
                'cat' => 'SH',
                'sub_division' => 'dabhoi',
            ],

            [
                'name' => ' Diwada - Malekpur - Lunawada - Handod - Ambav - Varsada - Savli - Wagodia - Garudwshvar road S.H. No. 63  (Dabhoi - Tilakwada road Km. 31/0 to 50/0)',
                'chainage_from' => '31/0',
                'chainage_to' => '50/0',
                'total_length' => '19.00',
                'cat' => 'SH',
                'sub_division' => 'dabhoi',
            ],

            [
                'name' => ' Vadodara - Khendewadi - Halol road S.H. 87 BOT', 'chainage_from' => '8/3',
                'chainage_to' => '34/050',
                'total_length' => '25.75',
                'cat' => 'SH',
                'sub_division' => ' No.1',
            ],

            [
                'name' => ' Sathod - Chandod road',
                'chainage_from' => '0/0',
                'chainage_to' => '15/0',
                'total_length' => '15.00',
                'cat' => 'SH',
                'sub_division' => 'dabhoi'
            ],

            [
                'name' => ' Dabhoi -Dholar - Waghodia road SH No. 63',
                'chainage_from' => '0/0',
                'chainage_to' => '12/0',
                'total_length' => '12.00',
                'cat' => 'SH',
                'sub_division' => 'dabhoi'
            ],

            [
                'name' => ' Dabhoi -Dholar - Waghodia road SH No. 63',
                'chainage_from' => '12/0',
                'chainage_to' => '19/5',
                'total_length' => '7.50',
                'cat' => 'SH',
                'sub_division' => 'dabhoi'
            ],
            [
                'name' => ' (i) Jarod - Samlaya - Savli Road',
                'chainage_from' => '0/0',
                'chainage_to' => '17/7',
                'total_length' => '17.70',
                'cat' => 'SH',
                'sub_division' => 'No.2'
            ],

            [
                'name' => ' (ii)Jarod - Raval - Waghodia Km SH No. 63',
                'chainage_from' => '0/0',
                'chainage_to' => '18/0',
                'total_length' => '18.00',
                'cat' => 'SH',
                'sub_division' => 'No.2'
            ],
            [
                'name' => ' (i) Savli - Timba Road',
                'chainage_from' => '0/0',
                'chainage_to' => '38/0',
                'total_length' => '38.00',
                'cat' => 'SH',
                'sub_division' => 'No.2'

            ],
            [
                'name' => ' ii) Valavav to Varasada',
                'chainage_from' => '0/0',
                'chainage_to' => '7/25',
                'total_length' => '7.25',
                'cat' => 'SH',
                'sub_division' => 'No.2'

            ], [
                'name' => ' Nadiad - Bhalej - Old Poicha - Savli - Chapaner - Halol - Bhilod - Smilia - Dahod road S.C.I. (Savli - Poicha road) SH no 150',
                'chainage_from' => '0/0',
                'chainage_to' => '9/7',
                'total_length' => '9.70',
                'cat' => 'SH',
                'sub_division' => 'No.2'
            ],


            [
                'name' => ' Savli - Vadia - Champaner (S.H. No. 150) (SavliHalol Road)',
                'chainage_from' => '0/0',
                'chainage_to' => '24/4',
                'total_length' => '24.40',
                'cat' => 'SH',
                'sub_division' => 'No.2'
            ],
            [
                'name' => ' Savli - Tundav - Manjusar - Dumad - Vadodara -  Timba - Waghodia - Gugalpur - Bhatpur - Vasna -  Kosindra road SH no 158 Section III Vadodara -  Savli Road',
                'chainage_from' => '9/6',
                'chainage_to' => '32/4',
                'total_length' => '22.8',
                'cat' => 'SH',
                'sub_division' => 'No.2'
            ],


            [
                'name' => ' Waghodia - Kherwadi - Rustampura Road',
                'chainage_from' => '18/0',
                'chainage_to' => '35/3',
                'total_length' => '17.30',
                'cat' => 'SH',
                'sub_division' => 'No.2'
            ],

            [
                'name' => ' Padra - Sadhi - Karjan -    Vemar - Sinor -  Phophlidiya - Bithali - Dariyapura road S.H. No.  160 Section : II Karjan - Vemar - Sadhli road',
                'chainage_from' => '0/0',
                'chainage_to' => '19/60',
                'total_length' => '19.60',
                'cat' => 'SH',
                'sub_division' => 'No.1'
            ],

            [
                'name' => ' Sadhli - Sinor Road',
                'chainage_from' => '19/60',
                'chainage_to' => '30/8',
                'total_length' => '11.20',
                'cat' => 'SH',
                'sub_division' => 'Dabhoi'
            ],
            [
                'name' => ' Section II Karjan - Padra road S.H. No. 160',
                'chainage_from' => '0/0',
                'chainage_to' => '23/2',
                'total_length' => '23.20',
                'cat' => 'SH',
                'sub_division' => 'No.1'
            ],

            [
                'name' => ' Section Sinor - Dabhoi - Segwa - Sinor - Malsar  Road S.H. No. 161',
                'chainage_from' => '0/4',
                'chainage_to' => '32/0',
                'total_length' => '31.60',
                'cat' => 'SH',
                'sub_division' => 'Dabhoi'
            ],

            [
                'name' => ' Section Karjan - Kayavarohan - Dabhoi road Km.  0/0 to 31/6 S.H. No. 160',
                'chainage_from' => '0/0',
                'chainage_to' => '13/260',
                'total_length' => '13.26',
                'cat' => 'SH',
                'sub_division' => ' No.1
            '
            ],
            [
                'name' => ' Section Karjan - Kayavarohan - Dabhoi road Km.  0/0 to 31/6 S.H. No. 160',
                'chainage_from' => '0/0',
                'chainage_to' => '13/260',
                'total_length' => '13.26',
                'cat' => 'SH',
                'sub_division' => ' No.1'
            ], ['name' => ' Section Karjan - Miyagam - Matar - Sarbhan road  (Karjan - Samni - Amod road)'], ['name' => ' Sadhli - Segwa road S.H. No. 160'], ['name' => ' Halol - Baska - Madodhar - Waghodia road S.H.  No. 194 Section waghodia - Ghutal - Madodhar  Road'], ['name' => ' karjan Diversion road'], ['name' => ' Palej - Nareshwar road'], ['name' => ' Manglej - Ganpatpura - Kurali - Nareshwar road'], ['name' => ' Vadodara - Padra - Sejakuva road'], ['name' => ' Por - Karvan - Sadhi road (With Rangav Bridge  approach)'], ['name' => ' Vadodara - Ajwa Road'], ['name' => ' Ajwa - Gutal - Rameshra Road'], ['name' => ' Vadodara - Waghodia Road'], ['name' => ' Waghodia - Gorej - Rameshra'], ['name' => ' Lilora - Shankarpura - Mudhera - Khakhria - 
 Bhagana - Muvada - Madhvas road (Lilora -Paldi- Khakhariya-Madhvas Road)'],
            ['name' => ' Vanchara - Mobha - Muval - Chitral - Karkhadi - Kareli - Dudhwada road'], ['name' => '  Dhadhar Approach Road'], ['name' => '  Harni - Virod - Pilol - Sherpura - Mevli - Pandu road'], ['name' => '  Ranu - Mahuvad Road (Missing Link)'], ['name' => '  Old N.H. No. - 8 of Por Village'], ['name' => '  Dabhoi - Segwa - Rajpipla Road '], ['name' => '  Segwa - Sinor - Malsar Road ( BYPASS)'], ['name' => '  Bahadarpur Hareshwar Kherwadi Road'], ['name' => ' Anandi - Satisana Road 0/0 to 4/4'], ['name' => ' Waghodia - Goraj - Rustampura Road'], ['name' => ' Nimeta - Sakariya -Rasulabad - Kodarvaya-Kheda karmasiya - Navagam - Umaj road '], ['name' => ' Karjan - Umaj Road'], ['name' => ' Kanabha - Bodka - Sampa - Occhan Road '], ['name' => '  Padra - Masar Road'], ['name' => ' Dabka - Wadu - Bhoj - Sadhi - Saraswani - Itola Road'], ['name' => ' State Highway to Kural - Shanpur - Sokhda -Raghu road'], ['name' => ' Sankarda - Bhadarva - Savli Road'], ['name' => '  Samlaya - Tundav - Raniya Road'], ['name' => ' Samlaya - Motibhadol - Rampura - Mevli Road'], ['name' => '  Champaner - Samlaya Road'], ['name' => ' Pandu - Valavav Road'], ['name' => ' Rajli - Mandala Road'], ['name' => ' Bhilapur - Vanadara - Madheli Road'], ['name' => ' Chhatral - Khanpur - Kayavarohan Road Km. 0/0 to 6/6'], ['name' => '  Segwa - Barkal road'], ['name' => ' Vadodara - Padra - Jambusar S.H. No. 6 Km. 8/4 to
 43/8)'], ['name' => ' (Mujpur Approach Road) (0/0 to 4/1)'], ['name' => ' Vadodara - Khendewadi - Halol road S.H. 87 BOT'], ['name' => ' Padra - Sadhi - Karjan - Vemar - Sinor - Phophlidiya -Bithali - Dariyapura road S.H. No. 160 Section : II Karjan - Vemar - Sadhli road'], ['name' => '  Section II Karjan - Padra road S.H. No. 160'], ['name' => ' Section Karjan - Kayavarohan - Dabhoi road Km. 0/0 
 to 31/6 S.H. No. 160'], ['name' => ' Section Karjan - Miyagam - Matar - Sarbhan road 
 (Karjan - Samni - Amod road)'], ['name' => '  Karjan Diversion road'], ['name' => ' Palej - Nareshwar road '], ['name' => '  Manglej - Ganpatpura - Kurali - Nareshwar road'], ['name' => ' Vadodara - Padra - Sejakuva road'], ['name' => ' Por - Karvan - Sadhi road (With Rangav Bridge 
 approach)'], ['name' => '  Vadodara - Ajwa Road'], ['name' => ' Vanchara - Mobha - Muval - Chitral - Karkhadi - Kareli 
 - Dudhwada road'], ['name' => '  Dhadhar Approach Road'], ['name' => ' Ranu - Mahuvad Road (Missing Link)'], ['name' => '  Old N.H. No. - 8 of Por Village'], ['name' => '  Karjan - Umaj Road'], ['name' => '  Kanabha - Bodka - Sampa - Occhan Road'], ['name' => '  Padra - Masar Road'], ['name' => ' Dabka - Wadu - Bhoj - Sadhi - Saraswani - Itola Road'], ['name' => ' State Highway to Kural - Shanpur - Sokhda - Raghu
 road'], ['name' => ' Dabhoi -Dholar - Waghodia road SH No. 63 '], ['name' => ' Jarod - Samlaya - Savli Road'], ['name' => ' Jarod - Raval - Waghodia Km SH No. 63 '], ['name' => '  Savli - Timba Road '], ['name' => ' Valavav to Varasada '], ['name' => ' Nadiad - Bhalej - Old Poicha - Savli -
 Chapaner - Halol - Bhilod - Smilia - Dahod
 road S.C.I. (Savli - Poicha road) SH no 150'], ['name' => ' Savli - Vadia - Champaner (S.H. No. 150)
 (Savli-Halol Road) '], ['name' => ' Savli - Tundav - Manjusar - Dumad - Vadodara 
 - Timba - Waghodia - Gugalpur - Bhatpur - 
 Vasna - Kosindra road SH no 158 Section III 
 Vadodara - Savli Road'], ['name' => ' Waghodia - Kherwadi - Rustampura Road'], ['name' => ' Halol - Baska - Madodhar - Waghodia road 
 S.H. No. 194 Section waghodia - Ghutal - 
 Madodhar Road'], ['name' => ' Ajwa - Gutal - Rameshra Road '], ['name' => ' Vadodara - Waghodia Road '], ['name' => ' Waghodia - Gorej - Rameshra '], ['name' => ' Lilora - Shankarpura - Mudhera - Khakhria - 
 Bhagana - Muvada - Madhvas road 
 (Lilora -Paldi- Khakhariya-Madhvas Road)'], ['name' => ' Harni - Virod - Pilol - Sherpura - Mevli - Pandu 
 road '], ['name' => ' Bahadarpur Hareshwar Kherwadi Road'], ['name' => '  Waghodia - Goraj - Rustampura Road '], ['name' => ' Nimeta - Sakariya -Rasulabad - Kodarvaya -
 Kheda karmasiya - Navagam - Umaj road'], ['name' => '  Sankarda - Bhadarva - Savli Road '], ['name' => ' Samlaya - Tundav - Raniya Road '], ['name' => '  Samlaya - Motibhadol - Rampura - Mevli Road'], ['name' => ' Champaner - Samlaya Road'], ['name' => '  Pandu - Valavav Road '], ['name' => ' Vadodara - Dabhoi Road '], ['name' => ' Borsad - Umeta - Singhrot - Gotri - Vadodara - 
 Dabhoi - Bodeli - Chhotaudepur - Alirajpur up to 
 State Border S.H. No.11 
 (Dabhoi Bodeli Road)'], ['name' => ' Diwada - Malekpur - Lunawada - Handod - Ambav -
 Varsada - Savli - Wagodia - Garudwshvar road
 S.H. No. 63 
 (Dabhoi - Tilakwada road Km. 31/0 to 50/0)'], ['name' => '  Sathod - Chandod road'], ['name' => ' Dabhoi -Dholar - Waghodia road SH No. 63'], ['name' => ' Sadhli - Sinor Road'], ['name' => ' 
 Section Sinor - Dabhoi - Segwa - Sinor - Malsar 
 Road S.H. No. 161 '], ['name' => ' Section Karjan - Kayavarohan - Dabhoi road Km. 
 0/0 to 31/6 S.H. No. 160'], ['name' => '  Sadhli - Segwa road S.H. No. 160'], ['name' => '  Dabhoi - Segwa - Rajpipla Road'], ['name' => '  Segwa - Sinor - Malsar Road ( BYPASS)'], ['name' => '  Anandi - Satisana Road 0/0 to 4/4'], ['name' => ' Rajli - Mandala Road'], ['name' => '  Bhilapur - Vanadara - Madheli Road'], ['name' => ' Chhatral - Khanpur - Kayavarohan Road Km. 0/0
 to 6/6 '], [
                'name' => ' Segwa - Barkal road'
            ],




        ]);
    }
}
