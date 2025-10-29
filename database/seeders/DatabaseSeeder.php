<?php

namespace Database\Seeders;


use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
use App\Models\UserType;
use App\Models\Gender;
use App\Models\FoodPreference;
use App\Models\State;
use App\Models\District;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        UserType::insert([
            ['user_type_name' => 'Admin'],
            ['user_type_name' => 'Developer'],
            ['user_type_name' => 'Owner'],
            ['user_type_name' => 'Manager'],
            ['user_type_name' => 'Manager Production'],
            ['user_type_name' => 'Manager Sale'],
            ['user_type_name' => 'Worker'],
        ]);

        Department::insert([
            ['department_name' => 'Administration'],
            ['depatment_name' => 'Development'],
            ['depatment_name' => 'Ownership'],
            ['depatment_name' => 'Office'],
        ]);
        Designation::insert([
            ['designation_name' => 'Administrator'],
            ['designation_name' => 'Developer'],
            ['designation_name' => 'Owner'],
            ['designation_name' => 'Manager'],
            ['designation_name' => 'Manager Production'],
            ['designation_name' => 'Manager Sale'],
            ['designation_name' => 'Worker'],
        ]);
        Employee::insert([
            ['employee_name' => 'Vivekanada', 'mobile' => '9836444999', 'email' => 'bangle312@gmail.com', 'department_id' => 3, 'designation_id' => 3],
            ['employee_name' => 'Sukanta Hui', 'mobile' => '7003756860', 'email' => 'sukantahui@gmail.com', 'department_id' => 2, 'designation_id' => 2],
            ['employee_name' => 'Saheb Ghosh', 'mobile' => '833486$state->id99', 'email' => 'sahebghosh89@gmail.com', 'department_id' => 4, 'designation_id' => 4]
        ]);
        //admin created
        $user = User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 1,
            'employee_id' => 2
        ]);
        $this->command->info('Created user ADMIN:');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );
        //developer created
        $user = User::create([
            'email' => 'developer@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
            'employee_id' => 2
        ]);
        $this->command->info('Created user: Developer');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );
        //owner created
        $user = User::create([
            'email' => 'owner@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 3,
            'employee_id' => 1
        ]);
        $this->command->info('Created user: owner');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );

        //owner created
        $user = User::create([
            'email' => 'manager@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 4,
            'employee_id' => 3
        ]);
        $this->command->info('Created user: Manager');
        $this->command->table(
            ['Email', 'Created At'],
            [[$user->email, $user->created_at]]
        );
        Gender::insert([
            ['gender_name' => 'Male'],
            ['gender_name' => 'Female'],
            ['gender_name' => 'Other'],
        ]);
        FoodPreference::insert([
            ['food_preference_name' => 'Vegetarian'],
            ['food_preference_name' => 'Non-Vegetarian']
        ]);
        //Jammu & Kashmir
        $state=State::create(['state_code' => 1, 'state_name' => 'Jammu & Kashmir']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Anantnag'],
            ['state_id' => $state->id, 'district_name' => 'Bandipora'],
            ['state_id' => $state->id, 'district_name' => 'Baramulla'],
            ['state_id' => $state->id, 'district_name' => 'Budgam'],
            ['state_id' => $state->id, 'district_name' => 'Doda'],
            ['state_id' => $state->id, 'district_name' => 'Ganderbal'],
            ['state_id' => $state->id, 'district_name' => 'Jammu'],
            ['state_id' => $state->id, 'district_name' => 'Kathua'],
            ['state_id' => $state->id, 'district_name' => 'Kishtwar'],
            ['state_id' => $state->id, 'district_name' => 'Kulgam'],
            ['state_id' => $state->id, 'district_name' => 'Kupwara'],
            ['state_id' => $state->id, 'district_name' => 'Poonch'],
            ['state_id' => $state->id, 'district_name' => 'Pulwama'],
            ['state_id' => $state->id, 'district_name' => 'Rajouri'],
            ['state_id' => $state->id, 'district_name' => 'Ramban'],
            ['state_id' => $state->id, 'district_name' => 'Reasi'],
            ['state_id' => $state->id, 'district_name' => 'Samba'],
            ['state_id' => $state->id, 'district_name' => 'Shopian'],
            ['state_id' => $state->id, 'district_name' => 'Srinagar'],
            ['state_id' => $state->id, 'district_name' => 'Udhampur'],
        ]);

        

        // for Himachal Pradesh states
        $state=State::create(['state_code' => 2, 'state_name' => 'Himachal Pradesh']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Bilaspur HP'],
            ['state_id' => $state->id, 'district_name' => 'Chamba'],
            ['state_id' => $state->id, 'district_name' => 'Hamirpur HP'],
            ['state_id' => $state->id, 'district_name' => 'Kangra'],
            ['state_id' => $state->id, 'district_name' => 'Kinnaur'],
            ['state_id' => $state->id, 'district_name' => 'Kullu'],
            ['state_id' => $state->id, 'district_name' => 'Lahaul and Spiti'],
            ['state_id' => $state->id, 'district_name' => 'Mandi'],
            ['state_id' => $state->id, 'district_name' => 'Shimla'],
            ['state_id' => $state->id, 'district_name' => 'Sirmaur'],
            ['state_id' => $state->id, 'district_name' => 'Solan'],
            ['state_id' => $state->id, 'district_name' => 'Una'],
        ]);

        // for Punjab
        $state->id=State::create(['state_code' => 3, 'state_name' => 'Punjab']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Amritsar'],
            ['state_id' => $state->id, 'district_name' => 'Barnala'],
            ['state_id' => $state->id, 'district_name' => 'Bathinda'],
            ['state_id' => $state->id, 'district_name' => 'Faridkot'],
            ['state_id' => $state->id, 'district_name' => 'Fatehgarh Sahib'],
            ['state_id' => $state->id, 'district_name' => 'Fazilka'],
            ['state_id' => $state->id, 'district_name' => 'Ferozepur'],
            ['state_id' => $state->id, 'district_name' => 'Gurdaspur'],
            ['state_id' => $state->id, 'district_name' => 'Hoshiarpur'],
            ['state_id' => $state->id, 'district_name' => 'Jalandhar'],
            ['state_id' => $state->id, 'district_name' => 'Kapurthala'],
            ['state_id' => $state->id, 'district_name' => 'Ludhiana'],
            ['state_id' => $state->id, 'district_name' => 'Malerkotla'],
            ['state_id' => $state->id, 'district_name' => 'Mansa'],
            ['state_id' => $state->id, 'district_name' => 'Moga'],
            ['state_id' => $state->id, 'district_name' => 'Muktsar'],
            ['state_id' => $state->id, 'district_name' => 'Pathankot'],
            ['state_id' => $state->id, 'district_name' => 'Patiala'],
            ['state_id' => $state->id, 'district_name' => 'Rupnagar'],
            ['state_id' => $state->id, 'district_name' => 'Sangrur'],
            ['state_id' => $state->id, 'district_name' => 'SAS Nagar (Mohali)'],
            ['state_id' => $state->id, 'district_name' => 'SBS Nagar (Nawanshahr)'],
            ['state_id' => $state->id, 'district_name' => 'Tarn Taran'],
        ]);     
        // for Chandigarh states
        $state=State::create(['state_code' => 4, 'state_name' => 'Chandigarh']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Chandigarh'],
        ]);
        // for Uttarakhand states
        $state=State::create(['state_code' => 5, 'state_name' => 'Uttarakhand']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Almora'],
            ['state_id' => $state->id, 'district_name' => 'Bageshwar'],
            ['state_id' => $state->id, 'district_name' => 'Chamoli'],
            ['state_id' => $state->id, 'district_name' => 'Champawat'],
            ['state_id' => $state->id, 'district_name' => 'Dehradun'],
            ['state_id' => $state->id, 'district_name' => 'Haridwar'],
            ['state_id' => $state->id, 'district_name' => 'Nainital'],
            ['state_id' => $state->id, 'district_name' => 'Pauri Garhwal'],
            ['state_id' => $state->id, 'district_name' => 'Pithoragarh'],
            ['state_id' => $state->id, 'district_name' => 'Rudraprayag'],
            ['state_id' => $state->id, 'district_name' => 'Tehri Garhwal'],
            ['state_id' => $state->id, 'district_name' => 'Udham Singh Nagar'],
            ['state_id' => $state->id, 'district_name' => 'Uttarkashi'],
        ]);

        // for Haryana states
        $state=State::create(['state_code' => 6, 'state_name' => 'Haryana']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Ambala'],
            ['state_id' => $state->id, 'district_name' => 'Bhiwani'],
            ['state_id' => $state->id, 'district_name' => 'Charkhi Dadri'],
            ['state_id' => $state->id, 'district_name' => 'Faridabad'],
            ['state_id' => $state->id, 'district_name' => 'Fatehabad'],
            ['state_id' => $state->id, 'district_name' => 'Gurugram'],
            ['state_id' => $state->id, 'district_name' => 'Hisar'],
            ['state_id' => $state->id, 'district_name' => 'Jhajjar'],
            ['state_id' => $state->id, 'district_name' => 'Jind'],
            ['state_id' => $state->id, 'district_name' => 'Kaithal'],
            ['state_id' => $state->id, 'district_name' => 'Karnal'],
            ['state_id' => $state->id, 'district_name' => 'Kurukshetra'],
            ['state_id' => $state->id, 'district_name' => 'Mahendragarh'],
            ['state_id' => $state->id, 'district_name' => 'Nuh'],
            ['state_id' => $state->id, 'district_name' => 'Palwal'],
            ['state_id' => $state->id, 'district_name' => 'Panchkula'],
            ['state_id' => $state->id, 'district_name' => 'Panipat'],
            ['state_id' => $state->id, 'district_name' => 'Rewari'],
            ['state_id' => $state->id, 'district_name' => 'Rohtak'],
            ['state_id' => $state->id, 'district_name' => 'Sirsa'],
            ['state_id' => $state->id, 'district_name' => 'Sonipat'],
            ['state_id' => $state->id, 'district_name' => 'Yamunanagar'],
        ]);

        // for Delhi states
        $state=State::create(['state_code' => 7, 'state_name' => 'Delhi']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Central Delhi'],
            ['state_id' => $state->id, 'district_name' => 'East Delhi'],
            ['state_id' => $state->id, 'district_name' => 'New Delhi'],
            ['state_id' => $state->id, 'district_name' => 'North Delhi'],
            ['state_id' => $state->id, 'district_name' => 'North East Delhi'],
            ['state_id' => $state->id, 'district_name' => 'North West Delhi'],
            ['state_id' => $state->id, 'district_name' => 'Shahdara'],
            ['state_id' => $state->id, 'district_name' => 'South Delhi'],
            ['state_id' => $state->id, 'district_name' => 'South East Delhi'],
            ['state_id' => $state->id, 'district_name' => 'South West Delhi'],
            ['state_id' => $state->id, 'district_name' => 'West Delhi'],
        ]);

        // for Rajasthan states
        $state=State::create(['state_code' => 8, 'state_name' => 'Rajasthan']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Ajmer'],
            ['state_id' => $state->id, 'district_name' => 'Alwar'],
            ['state_id' => $state->id, 'district_name' => 'Banswara'],
            ['state_id' => $state->id, 'district_name' => 'Baran'],
            ['state_id' => $state->id, 'district_name' => 'Barmer'],
            ['state_id' => $state->id, 'district_name' => 'Bharatpur'],
            ['state_id' => $state->id, 'district_name' => 'Bhilwara'],
            ['state_id' => $state->id, 'district_name' => 'Bikaner'],
            ['state_id' => $state->id, 'district_name' => 'Bundi'],
            ['state_id' => $state->id, 'district_name' => 'Chittorgarh'],
            ['state_id' => $state->id, 'district_name' => 'Churu'],
            ['state_id' => $state->id, 'district_name' => 'Dausa'],
            ['state_id' => $state->id, 'district_name' => 'Dholpur'],
            ['state_id' => $state->id, 'district_name' => 'Dungarpur'],
            ['state_id' => $state->id, 'district_name' => 'Hanumangarh'],
            ['state_id' => $state->id, 'district_name' => 'Jaipur'],
            ['state_id' => $state->id, 'district_name' => 'Jaisalmer'],
            ['state_id' => $state->id, 'district_name' => 'Jalore'],
            ['state_id' => $state->id, 'district_name' => 'Jhalawar'],
            ['state_id' => $state->id, 'district_name' => 'Jhunjhunu'],
            ['state_id' => $state->id, 'district_name' => 'Jodhpur'],
            ['state_id' => $state->id, 'district_name' => 'Karauli'],
            ['state_id' => $state->id, 'district_name' => 'Kota'],
            ['state_id' => $state->id, 'district_name' => 'Nagaur'],
            ['state_id' => $state->id, 'district_name' => 'Pali'],
            ['state_id' => $state->id, 'district_name' => 'Pratapgarh RJ'],
            ['state_id' => $state->id, 'district_name' => 'Rajsamand'],
            ['state_id' => $state->id, 'district_name' => 'Sawai Madhopur'],
            ['state_id' => $state->id, 'district_name' => 'Sikar'],
            ['state_id' => $state->id, 'district_name' => 'Sirohi'],
            ['state_id' => $state->id, 'district_name' => 'Sri Ganganagar'],
            ['state_id' => $state->id, 'district_name' => 'Tonk'],
            ['state_id' => $state->id, 'district_name' => 'Udaipur'],
        ]);

        // for Uttar Pradesh states
        $state=State::create(['state_code' => 9, 'state_name' => 'Uttar Pradesh']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Agra'],
            ['state_id' => $state->id, 'district_name' => 'Aligarh'],
            ['state_id' => $state->id, 'district_name' => 'Ambedkar Nagar'],
            ['state_id' => $state->id, 'district_name' => 'Amethi'],
            ['state_id' => $state->id, 'district_name' => 'Amroha (J.P. Nagar)'],
            ['state_id' => $state->id, 'district_name' => 'Auraiya'],
            ['state_id' => $state->id, 'district_name' => 'Ayodhya (Faizabad)'],
            ['state_id' => $state->id, 'district_name' => 'Azamgarh'],
            ['state_id' => $state->id, 'district_name' => 'Baghpat'],
            ['state_id' => $state->id, 'district_name' => 'Bahraich'],
            ['state_id' => $state->id, 'district_name' => 'Ballia'],
            ['state_id' => $state->id, 'district_name' => 'Balrampur UP'],
            ['state_id' => $state->id, 'district_name' => 'Banda'],
            ['state_id' => $state->id, 'district_name' => 'Barabanki'],
            ['state_id' => $state->id, 'district_name' => 'Bareilly'],
            ['state_id' => $state->id, 'district_name' => 'Basti'],
            ['state_id' => $state->id, 'district_name' => 'Bhadohi (Sant Ravidas Nagar)'],
            ['state_id' => $state->id, 'district_name' => 'Bijnor'],
            ['state_id' => $state->id, 'district_name' => 'Budaun'],
            ['state_id' => $state->id, 'district_name' => 'Bulandshahr'],
            ['state_id' => $state->id, 'district_name' => 'Chandauli'],
            ['state_id' => $state->id, 'district_name' => 'Chitrakoot'],
            ['state_id' => $state->id, 'district_name' => 'Deoria'],
            ['state_id' => $state->id, 'district_name' => 'Etah'],
            ['state_id' => $state->id, 'district_name' => 'Etawah'],
            ['state_id' => $state->id, 'district_name' => 'Farrukhabad'],
            ['state_id' => $state->id, 'district_name' => 'Fatehpur'],
            ['state_id' => $state->id, 'district_name' => 'Firozabad'],
            ['state_id' => $state->id, 'district_name' => 'Gautam Buddha Nagar (Noida)'],
            ['state_id' => $state->id, 'district_name' => 'Ghaziabad'],
            ['state_id' => $state->id, 'district_name' => 'Ghazipur'],
            ['state_id' => $state->id, 'district_name' => 'Gonda'],
            ['state_id' => $state->id, 'district_name' => 'Gorakhpur'],
            ['state_id' => $state->id, 'district_name' => 'Hamirpur UP'],
            ['state_id' => $state->id, 'district_name' => 'Hapur (Panchsheel Nagar)'],
            ['state_id' => $state->id, 'district_name' => 'Hardoi'],
            ['state_id' => $state->id, 'district_name' => 'Hathras (Mahamaya Nagar)'],
            ['state_id' => $state->id, 'district_name' => 'Jalaun'],
            ['state_id' => $state->id, 'district_name' => 'Jaunpur'],
            ['state_id' => $state->id, 'district_name' => 'Jhansi'],
            ['state_id' => $state->id, 'district_name' => 'Kannauj'],
            ['state_id' => $state->id, 'district_name' => 'Kanpur Dehat (Rural)'],
            ['state_id' => $state->id, 'district_name' => 'Kanpur Nagar (Urban)'],
            ['state_id' => $state->id, 'district_name' => 'Kasganj (Kanshiram Nagar)'],
            ['state_id' => $state->id, 'district_name' => 'Kaushambi'],
            ['state_id' => $state->id, 'district_name' => 'Kushinagar'],
            ['state_id' => $state->id, 'district_name' => 'Lakhimpur Kheri'],
            ['state_id' => $state->id, 'district_name' => 'Lalitpur'],
            ['state_id' => $state->id, 'district_name' => 'Lucknow'],
            ['state_id' => $state->id, 'district_name' => 'Maharajganj'],
            ['state_id' => $state->id, 'district_name' => 'Mahoba'],
            ['state_id' => $state->id, 'district_name' => 'Mainpuri'],
            ['state_id' => $state->id, 'district_name' => 'Mathura'],
            ['state_id' => $state->id, 'district_name' => 'Mau'],
            ['state_id' => $state->id, 'district_name' => 'Meerut'],
            ['state_id' => $state->id, 'district_name' => 'Mirzapur'],
            ['state_id' => $state->id, 'district_name' => 'Moradabad'],
            ['state_id' => $state->id, 'district_name' => 'Muzaffarnagar'],
            ['state_id' => $state->id, 'district_name' => 'Pilibhit'],
            ['state_id' => $state->id, 'district_name' => 'Pratapgarh UP'],
            ['state_id' => $state->id, 'district_name' => 'Prayagraj (Allahabad)'],
            ['state_id' => $state->id, 'district_name' => 'Raebareli'],
            ['state_id' => $state->id, 'district_name' => 'Rampur'],
            ['state_id' => $state->id, 'district_name' => 'Saharanpur'],
            ['state_id' => $state->id, 'district_name' => 'Sambhal (Bheem Nagar)'],
            ['state_id' => $state->id, 'district_name' => 'Sant Kabir Nagar'],
            ['state_id' => $state->id, 'district_name' => 'Shahjahanpur'],
            ['state_id' => $state->id, 'district_name' => 'Shamli'],
            ['state_id' => $state->id, 'district_name' => 'Shravasti'],
            ['state_id' => $state->id, 'district_name' => 'Siddharthnagar'],
            ['state_id' => $state->id, 'district_name' => 'Sitapur'],
            ['state_id' => $state->id, 'district_name' => 'Sonbhadra'],
            ['state_id' => $state->id, 'district_name' => 'Sultanpur'],
            ['state_id' => $state->id, 'district_name' => 'Unnao'],
            ['state_id' => $state->id, 'district_name' => 'Varanasi'],
        ]);
        // for Bihar states
        $state=State::create(['state_code' => 10, 'state_name' => 'Bihar']);
        District::insert([
            ['state_id' => $state, 'district_name' => 'Araria'],
            ['state_id' => $state, 'district_name' => 'Arwal'],
            ['state_id' => $state, 'district_name' => 'Aurangabad'],
            ['state_id' => $state, 'district_name' => 'Banka'],
            ['state_id' => $state, 'district_name' => 'Begusarai'],
            ['state_id' => $state, 'district_name' => 'Bhagalpur'],
            ['state_id' => $state, 'district_name' => 'Bhojpur'],
            ['state_id' => $state, 'district_name' => 'Buxar'],
            ['state_id' => $state, 'district_name' => 'Darbhanga'],
            ['state_id' => $state, 'district_name' => 'East Champaran (Motihari)'],
            ['state_id' => $state, 'district_name' => 'Gaya'],
            ['state_id' => $state, 'district_name' => 'Gopalganj'],
            ['state_id' => $state, 'district_name' => 'Jamui'],
            ['state_id' => $state, 'district_name' => 'Jehanabad'],
            ['state_id' => $state, 'district_name' => 'Kaimur (Bhabua)'],
            ['state_id' => $state, 'district_name' => 'Katihar'],
            ['state_id' => $state, 'district_name' => 'Khagaria'],
            ['state_id' => $state, 'district_name' => 'Kishanganj'],
            ['state_id' => $state, 'district_name' => 'Lakhisarai'],
            ['state_id' => $state, 'district_name' => 'Madhepura'],
            ['state_id' => $state, 'district_name' => 'Madhubani'],
            ['state_id' => $state, 'district_name' => 'Munger'],
            ['state_id' => $state, 'district_name' => 'Muzaffarpur'],
            ['state_id' => $state, 'district_name' => 'Nalanda'],
            ['state_id' => $state, 'district_name' => 'Nawada'],
            ['state_id' => $state, 'district_name' => 'Patna'],
            ['state_id' => $state, 'district_name' => 'Purnia'],
            ['state_id' => $state, 'district_name' => 'Rohtas'],
            ['state_id' => $state, 'district_name' => 'Saharsa'],
            ['state_id' => $state, 'district_name' => 'Samastipur'],
            ['state_id' => $state, 'district_name' => 'Saran'],
            ['state_id' => $state, 'district_name' => 'Sheikhpura'],
            ['state_id' => $state, 'district_name' => 'Sheohar'],
            ['state_id' => $state, 'district_name' => 'Sitamarhi'],
            ['state_id' => $state, 'district_name' => 'Siwan'],
            ['state_id' => $state, 'district_name' => 'Supaul'],
            ['state_id' => $state, 'district_name' => 'Vaishali'],
            ['state_id' => $state, 'district_name' => 'West Champaran (Bettiah)'],
        ]);

        // for Sikkim states
        $state=State::create(['state_code' => 11, 'state_name' => 'Sikkim']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Gangtok'],
            ['state_id' => $state->id, 'district_name' => 'Namchi'],
            ['state_id' => $state->id, 'district_name' => 'Mangan'],
            ['state_id' => $state->id, 'district_name' => 'Gyalshing'],
            ['state_id' => $state->id, 'district_name' => 'Soreng'],
            ['state_id' => $state->id, 'district_name' => 'Pakyong'],
        ]);

        // for Arunachal Pradesh states
        $state=State::create(['state_code' => 12, 'state_name' => 'Arunachal Pradesh']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Tawang'],
            ['state_id' => $state->id, 'district_name' => 'West Kameng'],
            ['state_id' => $state->id, 'district_name' => 'East Kameng'],
            ['state_id' => $state->id, 'district_name' => 'Papum Pare'],
            ['state_id' => $state->id, 'district_name' => 'Pakke-Kessang'],
            ['state_id' => $state->id, 'district_name' => 'Kamle'],
            ['state_id' => $state->id, 'district_name' => 'Kurung Kumey'],
            ['state_id' => $state->id, 'district_name' => 'Kra Daadi'],
            ['state_id' => $state->id, 'district_name' => 'Lower Subansiri'],
            ['state_id' => $state->id, 'district_name' => 'Upper Subansiri'],
            ['state_id' => $state->id, 'district_name' => 'West Siang'],
            ['state_id' => $state->id, 'district_name' => 'Shi Yomi'],
            ['state_id' => $state->id, 'district_name' => 'Leparada'],
            ['state_id' => $state->id, 'district_name' => 'Lower Siang'],
            ['state_id' => $state->id, 'district_name' => 'East Siang'],
            ['state_id' => $state->id, 'district_name' => 'Upper Siang'],
            ['state_id' => $state->id, 'district_name' => 'Lower Dibang Valley'],
            ['state_id' => $state->id, 'district_name' => 'Dibang Valley'],
            ['state_id' => $state->id, 'district_name' => 'Lohit'],
            ['state_id' => $state->id, 'district_name' => 'Anjaw'],
            ['state_id' => $state->id, 'district_name' => 'Namsai'],
            ['state_id' => $state->id, 'district_name' => 'Changlang'],
            ['state_id' => $state->id, 'district_name' => 'Tirap'],
            ['state_id' => $state->id, 'district_name' => 'Longding'],
        ]);

        // for Nagaland states
        $state=State::create(['state_code' => 13, 'state_name' => 'Nagaland']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Chümoukedima'],
            ['state_id' => $state->id, 'district_name' => 'Dimapur'],
            ['state_id' => $state->id, 'district_name' => 'Kiphire'],
            ['state_id' => $state->id, 'district_name' => 'Kohima'],
            ['state_id' => $state->id, 'district_name' => 'Longleng'],
            ['state_id' => $state->id, 'district_name' => 'Mokokchung'],
            ['state_id' => $state->id, 'district_name' => 'Mon'],
            ['state_id' => $state->id, 'district_name' => 'Niuland'],
            ['state_id' => $state->id, 'district_name' => 'Noklak'],
            ['state_id' => $state->id, 'district_name' => 'Peren'],
            ['state_id' => $state->id, 'district_name' => 'Phek'],
            ['state_id' => $state->id, 'district_name' => 'Shamator'],
            ['state_id' => $state->id, 'district_name' => 'Tseminyu'],
            ['state_id' => $state->id, 'district_name' => 'Tuensang'],
            ['state_id' => $state->id, 'district_name' => 'Wokha'],
            ['state_id' => $state->id, 'district_name' => 'Zunheboto'],
        ]);
        // for Manipur states
        $state=State::create(['state_code' => 14, 'state_name' => 'Manipur']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Bishnupur'],
            ['state_id' => $state->id, 'district_name' => 'Chandel'],
            ['state_id' => $state->id, 'district_name' => 'Churachandpur'],
            ['state_id' => $state->id, 'district_name' => 'Imphal East'],
            ['state_id' => $state->id, 'district_name' => 'Imphal West'],
            ['state_id' => $state->id, 'district_name' => 'Jiribam'],
            ['state_id' => $state->id, 'district_name' => 'Kakching'],
            ['state_id' => $state->id, 'district_name' => 'Kamjong'],
            ['state_id' => $state->id, 'district_name' => 'Kangpokpi'],
            ['state_id' => $state->id, 'district_name' => 'Noney'],
            ['state_id' => $state->id, 'district_name' => 'Pherzawl'],
            ['state_id' => $state->id, 'district_name' => 'Senapati'],
            ['state_id' => $state->id, 'district_name' => 'Tamenglong'],
            ['state_id' => $state->id, 'district_name' => 'Tengnoupal'],
            ['state_id' => $state->id, 'district_name' => 'Thoubal'],
            ['state_id' => $state->id, 'district_name' => 'Ukhrul'],
        ]);

        // for Mizoram states
        $state=State::create(['state_code' => 15, 'state_name' => 'Mizoram']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Aizawl'],
            ['state_id' => $state->id, 'district_name' => 'Champhai'],
            ['state_id' => $state->id, 'district_name' => 'Kolasib'],
            ['state_id' => $state->id, 'district_name' => 'Lawngtlai'],
            ['state_id' => $state->id, 'district_name' => 'Lunglei'],
            ['state_id' => $state->id, 'district_name' => 'Mamit'],
            ['state_id' => $state->id, 'district_name' => 'Saiha'],
            ['state_id' => $state->id, 'district_name' => 'Serchhip'],
            ['state_id' => $state->id, 'district_name' => 'Hnahthial'],
            ['state_id' => $state->id, 'district_name' => 'Khawzawl'],
            ['state_id' => $state->id, 'district_name' => 'Saitual'],
        ]);
        // for Tripura states
        $state=State::create(['state_code' => 16, 'state_name' => 'Tripura']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Dhalai'],
            ['state_id' => $state->id, 'district_name' => 'Gomati'],
            ['state_id' => $state->id, 'district_name' => 'Khowai'],
            ['state_id' => $state->id, 'district_name' => 'North Tripura'],
            ['state_id' => $state->id, 'district_name' => 'Sepahijala'],
            ['state_id' => $state->id, 'district_name' => 'South Tripura'],
            ['state_id' => $state->id, 'district_name' => 'Unakoti'],
            ['state_id' => $state->id, 'district_name' => 'West Tripura'],
        ]);

        // for Meghalaya states
        State::create(['state_code' => 17, 'state_name' => 'Meghalaya']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'East Garo Hills'],
            ['state_id' => $state->id, 'district_name' => 'West Garo Hills'],
            ['state_id' => $state->id, 'district_name' => 'South Garo Hills'],
            ['state_id' => $state->id, 'district_name' => 'North Garo Hills'],
            ['state_id' => $state->id, 'district_name' => 'South West Garo Hills'],
            ['state_id' => $state->id, 'district_name' => 'East Khasi Hills'],
            ['state_id' => $state->id, 'district_name' => 'West Khasi Hills'],
            ['state_id' => $state->id, 'district_name' => 'South West Khasi Hills'],
            ['state_id' => $state->id, 'district_name' => 'Ri-Bhoi'],
            ['state_id' => $state->id, 'district_name' => 'Eastern West Khasi Hills'],
            ['state_id' => $state->id, 'district_name' => 'West Jaintia Hills'],
            ['state_id' => $state->id, 'district_name' => 'East Jaintia Hills'],
        ]);

        // for Assam states
        State::create(['state_code' => 18, 'state_name' => 'Assam']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Baksa'],
            ['state_id' => $state->id, 'district_name' => 'Barpeta'],
            ['state_id' => $state->id, 'district_name' => 'Biswanath'],
            ['state_id' => $state->id, 'district_name' => 'Bongaigaon'],
            ['state_id' => $state->id, 'district_name' => 'Cachar'],
            ['state_id' => $state->id, 'district_name' => 'Charaideo'],
            ['state_id' => $state->id, 'district_name' => 'Chirang'],
            ['state_id' => $state->id, 'district_name' => 'Darrang'],
            ['state_id' => $state->id, 'district_name' => 'Dhemaji'],
            ['state_id' => $state->id, 'district_name' => 'Dhubri'],
            ['state_id' => $state->id, 'district_name' => 'Dibrugarh'],
            ['state_id' => $state->id, 'district_name' => 'Dima Hasao (North Cachar Hills)'],
            ['state_id' => $state->id, 'district_name' => 'Goalpara'],
            ['state_id' => $state->id, 'district_name' => 'Golaghat'],
            ['state_id' => $state->id, 'district_name' => 'Hailakandi'],
            ['state_id' => $state->id, 'district_name' => 'Hojai'],
            ['state_id' => $state->id, 'district_name' => 'Jorhat'],
            ['state_id' => $state->id, 'district_name' => 'Kamrup'],
            ['state_id' => $state->id, 'district_name' => 'Kamrup Metropolitan'],
            ['state_id' => $state->id, 'district_name' => 'Karbi Anglong'],
            ['state_id' => $state->id, 'district_name' => 'Karimganj'],
            ['state_id' => $state->id, 'district_name' => 'Kokrajhar'],
            ['state_id' => $state->id, 'district_name' => 'Lakhimpur'],
            ['state_id' => $state->id, 'district_name' => 'Majuli'],
            ['state_id' => $state->id, 'district_name' => 'Morigaon'],
            ['state_id' => $state->id, 'district_name' => 'Nagaon'],
            ['state_id' => $state->id, 'district_name' => 'Nalbari'],
            ['state_id' => $state->id, 'district_name' => 'Sivasagar'],
            ['state_id' => $state->id, 'district_name' => 'Sonitpur'],
            ['state_id' => $state->id, 'district_name' => 'South Salmara-Mankachar'],
            ['state_id' => $state->id, 'district_name' => 'Tinsukia'],
            ['state_id' => $state->id, 'district_name' => 'Udalguri'],
            ['state_id' => $state->id, 'district_name' => 'West Karbi Anglong'],
            ['state_id' => $state->id, 'district_name' => 'Tamulpur'],
            ['state_id' => $state->id, 'district_name' => 'Bajali'],
        ]);

        // for West Bengal states
        $state=State::create(['state_code' => $state->id, 'state_name' => 'West Bengal']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Alipurduar'],
            ['state_id' => $state->id, 'district_name' => 'Bankura'],
            ['state_id' => $state->id, 'district_name' => 'Birbhum'],
            ['state_id' => $state->id, 'district_name' => 'Cooch Behar'],
            ['state_id' => $state->id, 'district_name' => 'Dakshin Dinajpur'],
            ['state_id' => $state->id, 'district_name' => 'Darjeeling'],
            ['state_id' => $state->id, 'district_name' => 'Hooghly'],
            ['state_id' => $state->id, 'district_name' => 'Howrah'],
            ['state_id' => $state->id, 'district_name' => 'Jalpaiguri'],
            ['state_id' => $state->id, 'district_name' => 'Jhargram'],
            ['state_id' => $state->id, 'district_name' => 'Kalimpong'],
            ['state_id' => $state->id, 'district_name' => 'Kolkata'],
            ['state_id' => $state->id, 'district_name' => 'Malda'],
            ['state_id' => $state->id, 'district_name' => 'Murshidabad'],
            ['state_id' => $state->id, 'district_name' => 'Nadia'],
            ['state_id' => $state->id, 'district_name' => 'North 24 Parganas'],
            ['state_id' => $state->id, 'district_name' => 'Paschim Bardhaman'],
            ['state_id' => $state->id, 'district_name' => 'Paschim Medinipur'],
            ['state_id' => $state->id, 'district_name' => 'Purba Bardhaman'],
            ['state_id' => $state->id, 'district_name' => 'Purba Medinipur'],
            ['state_id' => $state->id, 'district_name' => 'Purulia'],
            ['state_id' => $state->id, 'district_name' => 'South 24 Parganas'],
            ['state_id' => $state->id, 'district_name' => 'Uttar Dinajpur'],
        ]);
        // for Jharkhand states
        $state=State::create(['state_code' => $state->id, 'state_name' => 'Jharkhand']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Bokaro'],
            ['state_id' => $state->id, 'district_name' => 'Chatra'],
            ['state_id' => $state->id, 'district_name' => 'Deoghar'],
            ['state_id' => $state->id, 'district_name' => 'Dhanbad'],
            ['state_id' => $state->id, 'district_name' => 'Dumka'],
            ['state_id' => $state->id, 'district_name' => 'East Singhbhum'],
            ['state_id' => $state->id, 'district_name' => 'Garhwa'],
            ['state_id' => $state->id, 'district_name' => 'Giridih'],
            ['state_id' => $state->id, 'district_name' => 'Godda'],
            ['state_id' => $state->id, 'district_name' => 'Gumla'],
            ['state_id' => $state->id, 'district_name' => 'Hazaribagh'],
            ['state_id' => $state->id, 'district_name' => 'Jamtara'],
            ['state_id' => $state->id, 'district_name' => 'Khunti'],
            ['state_id' => $state->id, 'district_name' => 'Koderma'],
            ['state_id' => $state->id, 'district_name' => 'Latehar'],
            ['state_id' => $state->id, 'district_name' => 'Lohardaga'],
            ['state_id' => $state->id, 'district_name' => 'Pakur'],
            ['state_id' => $state->id, 'district_name' => 'Palamu'],
            ['state_id' => $state->id, 'district_name' => 'Ramgarh'],
            ['state_id' => $state->id, 'district_name' => 'Ranchi'],
            ['state_id' => $state->id, 'district_name' => 'Sahebganj'],
            ['state_id' => $state->id, 'district_name' => 'Seraikela-Kharsawan'],
            ['state_id' => $state->id, 'district_name' => 'Simdega'],
            ['state_id' => $state->id, 'district_name' => 'West Singhbhum'],
        ]);
        // for odisha states
        $state=State::create(['state_code' => 21, 'state_name' => 'Odisha']);
        District::insert([
            ['state_id' => 21, 'district_name' => 'Angul'],
            ['state_id' => 21, 'district_name' => 'Balangir'],
            ['state_id' => 21, 'district_name' => 'Balasore'],
            ['state_id' => 21, 'district_name' => 'Bargarh'],
            ['state_id' => 21, 'district_name' => 'Bhadrak'],
            ['state_id' => 21, 'district_name' => 'Boudh'],
            ['state_id' => 21, 'district_name' => 'Cuttack'],
            ['state_id' => 21, 'district_name' => 'Deogarh'],
            ['state_id' => 21, 'district_name' => 'Dhenkanal'],
            ['state_id' => 21, 'district_name' => 'Gajapati'],
            ['state_id' => 21, 'district_name' => 'Ganjam'],
            ['state_id' => 21, 'district_name' => 'Jagatsinghpur'],
            ['state_id' => 21, 'district_name' => 'Jajpur'],
            ['state_id' => 21, 'district_name' => 'Jharsuguda'],
            ['state_id' => 21, 'district_name' => 'Kalahandi'],
            ['state_id' => 21, 'district_name' => 'Kandhamal'],
            ['state_id' => 21, 'district_name' => 'Kendrapara'],
            ['state_id' => 21, 'district_name' => 'Kendujhar (Keonjhar)'],
            ['state_id' => 21, 'district_name' => 'Khordha'],
            ['state_id' => 21, 'district_name' => 'Koraput'],
            ['state_id' => 21, 'district_name' => 'Malkangiri'],
            ['state_id' => 21, 'district_name' => 'Mayurbhanj'],
            ['state_id' => 21, 'district_name' => 'Nabarangpur'],
            ['state_id' => 21, 'district_name' => 'Nayagarh'],
            ['state_id' => 21, 'district_name' => 'Nuapada'],
            ['state_id' => 21, 'district_name' => 'Puri'],
            ['state_id' => 21, 'district_name' => 'Rayagada'],
            ['state_id' => 21, 'district_name' => 'Sambalpur'],
            ['state_id' => 21, 'district_name' => 'Subarnapur (Sonepur)'],
            ['state_id' => 21, 'district_name' => 'Sundargarh'],
        ]);

        // for Chhattisgarh states
        $state=State::create(['state_code' => 22, 'state_name' => 'Chhattisgarh']);
        District::insert([
            ['state_id' => 22, 'district_name' => 'Balod'],
            ['state_id' => 22, 'district_name' => 'Baloda Bazar'],
            ['state_id' => 22, 'district_name' => 'Balrampur CG'],
            ['state_id' => 22, 'district_name' => 'Bastar'],
            ['state_id' => 22, 'district_name' => 'Bemetara'],
            ['state_id' => 22, 'district_name' => 'Bijapur'],
            ['state_id' => 22, 'district_name' => 'Bilaspur CG'],
            ['state_id' => 22, 'district_name' => 'Dantewada (South Bastar)'],
            ['state_id' => 22, 'district_name' => 'Dhamtari'],
            ['state_id' => 22, 'district_name' => 'Durg'],
            ['state_id' => 22, 'district_name' => 'Gariaband'],
            ['state_id' => 22, 'district_name' => 'Gaurela-Pendra-Marwahi'],
            ['state_id' => 22, 'district_name' => 'Janjgir-Champa'],
            ['state_id' => 22, 'district_name' => 'Jashpur'],
            ['state_id' => 22, 'district_name' => 'Kabirdham (Kawardha)'],
            ['state_id' => 22, 'district_name' => 'Kanker (North Bastar)'],
            ['state_id' => 22, 'district_name' => 'Kondagaon'],
            ['state_id' => 22, 'district_name' => 'Korba'],
            ['state_id' => 22, 'district_name' => 'Koriya'],
            ['state_id' => 22, 'district_name' => 'Mahasamund'],
            ['state_id' => 22, 'district_name' => 'Mungeli'],
            ['state_id' => 22, 'district_name' => 'Narayanpur'],
            ['state_id' => 22, 'district_name' => 'Raigarh'],
            ['state_id' => 22, 'district_name' => 'Raipur'],
            ['state_id' => 22, 'district_name' => 'Rajnandgaon'],
            ['state_id' => 22, 'district_name' => 'Sukma'],
            ['state_id' => 22, 'district_name' => 'Surajpur'],
            ['state_id' => 22, 'district_name' => 'Surguja'],
            ['state_id' => 22, 'district_name' => 'Balrampur-Ramanujganj'],
            ['state_id' => 22, 'district_name' => 'Manendragarh-Chirmiri-Bharatpur'],
            ['state_id' => 22, 'district_name' => 'Sarangarh-Bilaigarh'],
            ['state_id' => 22, 'district_name' => 'Mohla-Manpur-Ambagarh Chowki'],
            ['state_id' => 22, 'district_name' => 'Khairagarh-Chhuikhadan-Gandai'],
        ]);
        // for Madhya Pradesh states  
        $state=State::create(['state_code' => 23, 'state_name' => 'Madhya Pradesh']);
        District::insert([
            ['state_id' => 23, 'district_name' => 'Agar Malwa'],
            ['state_id' => 23, 'district_name' => 'Alirajpur'],
            ['state_id' => 23, 'district_name' => 'Anuppur'],
            ['state_id' => 23, 'district_name' => 'Ashoknagar'],
            ['state_id' => 23, 'district_name' => 'Balaghat'],
            ['state_id' => 23, 'district_name' => 'Barwani'],
            ['state_id' => 23, 'district_name' => 'Betul'],
            ['state_id' => 23, 'district_name' => 'Bhind'],
            ['state_id' => 23, 'district_name' => 'Bhopal'],
            ['state_id' => 23, 'district_name' => 'Burhanpur'],
            ['state_id' => 23, 'district_name' => 'Chhatarpur'],
            ['state_id' => 23, 'district_name' => 'Chhindwara'],
            ['state_id' => 23, 'district_name' => 'Damoh'],
            ['state_id' => 23, 'district_name' => 'Datia'],
            ['state_id' => 23, 'district_name' => 'Dewas'],
            ['state_id' => 23, 'district_name' => 'Dhar'],
            ['state_id' => 23, 'district_name' => 'Dindori'],
            ['state_id' => 23, 'district_name' => 'Guna'],
            ['state_id' => 23, 'district_name' => 'Gwalior'],
            ['state_id' => 23, 'district_name' => 'Harda'],
            ['state_id' => 23, 'district_name' => 'Hoshangabad (Narmadapuram)'],
            ['state_id' => 23, 'district_name' => 'Indore'],
            ['state_id' => 23, 'district_name' => 'Jabalpur'],
            ['state_id' => 23, 'district_name' => 'Jhabua'],
            ['state_id' => 23, 'district_name' => 'Katni'],
            ['state_id' => 23, 'district_name' => 'Khandwa (East Nimar)'],
            ['state_id' => 23, 'district_name' => 'Khargone (West Nimar)'],
            ['state_id' => 23, 'district_name' => 'Mandla'],
            ['state_id' => 23, 'district_name' => 'Mandsaur'],
            ['state_id' => 23, 'district_name' => 'Morena'],
            ['state_id' => 23, 'district_name' => 'Narsinghpur'],
            ['state_id' => 23, 'district_name' => 'Neemuch'],
            ['state_id' => 23, 'district_name' => 'Niwari'],
            ['state_id' => 23, 'district_name' => 'Panna'],
            ['state_id' => 23, 'district_name' => 'Raisen'],
            ['state_id' => 23, 'district_name' => 'Rajgarh'],
            ['state_id' => 23, 'district_name' => 'Ratlam'],
            ['state_id' => 23, 'district_name' => 'Rewa'],
            ['state_id' => 23, 'district_name' => 'Sagar'],
            ['state_id' => 23, 'district_name' => 'Satna'],
            ['state_id' => 23, 'district_name' => 'Sehore'],
            ['state_id' => 23, 'district_name' => 'Seoni'],
            ['state_id' => 23, 'district_name' => 'Shahdol'],
            ['state_id' => 23, 'district_name' => 'Shajapur'],
            ['state_id' => 23, 'district_name' => 'Sheopur'],
            ['state_id' => 23, 'district_name' => 'Shivpuri'],
            ['state_id' => 23, 'district_name' => 'Sidhi'],
            ['state_id' => 23, 'district_name' => 'Singrauli'],
            ['state_id' => 23, 'district_name' => 'Tikamgarh'],
            ['state_id' => 23, 'district_name' => 'Ujjain'],
            ['state_id' => 23, 'district_name' => 'Umaria'],
            ['state_id' => 23, 'district_name' => 'Vidisha'],
            ['state_id' => 23, 'district_name' => 'Maihar'],
            ['state_id' => 23, 'district_name' => 'Nagda'],
            ['state_id' => 23, 'district_name' => 'Sailana'],
        ]);
        // for Gujarat states
        $state=State::create(['state_code' => 24, 'state_name' => 'Gujarat']);
        District::insert([
            ['state_id' => 24, 'district_name' => 'Ahmedabad'],
            ['state_id' => 24, 'district_name' => 'Amreli'],
            ['state_id' => 24, 'district_name' => 'Anand'],
            ['state_id' => 24, 'district_name' => 'Aravalli'],
            ['state_id' => 24, 'district_name' => 'Banaskantha (Palanpur)'],
            ['state_id' => 24, 'district_name' => 'Bharuch'],
            ['state_id' => 24, 'district_name' => 'Bhavnagar'],
            ['state_id' => 24, 'district_name' => 'Botad'],
            ['state_id' => 24, 'district_name' => 'Chhota Udepur'],
            ['state_id' => 24, 'district_name' => 'Dahod'],
            ['state_id' => 24, 'district_name' => 'Dang (Ahwa)'],
            ['state_id' => 24, 'district_name' => 'Devbhoomi Dwarka'],
            ['state_id' => 24, 'district_name' => 'Gandhinagar'],
            ['state_id' => 24, 'district_name' => 'Gir Somnath'],
            ['state_id' => 24, 'district_name' => 'Jamnagar'],
            ['state_id' => 24, 'district_name' => 'Junagadh'],
            ['state_id' => 24, 'district_name' => 'Kheda (Nadiad)'],
            ['state_id' => 24, 'district_name' => 'Kutch (Bhuj)'],
            ['state_id' => 24, 'district_name' => 'Mahisagar'],
            ['state_id' => 24, 'district_name' => 'Mehsana'],
            ['state_id' => 24, 'district_name' => 'Morbi'],
            ['state_id' => 24, 'district_name' => 'Narmada (Rajpipla)'],
            ['state_id' => 24, 'district_name' => 'Navsari'],
            ['state_id' => 24, 'district_name' => 'Panchmahal (Godhra)'],
            ['state_id' => 24, 'district_name' => 'Patan'],
            ['state_id' => 24, 'district_name' => 'Porbandar'],
            ['state_id' => 24, 'district_name' => 'Rajkot'],
            ['state_id' => 24, 'district_name' => 'Sabarkantha (Himmatnagar)'],
            ['state_id' => 24, 'district_name' => 'Surat'],
            ['state_id' => 24, 'district_name' => 'Surendranagar'],
            ['state_id' => 24, 'district_name' => 'Tapi (Vyara)'],
            ['state_id' => 24, 'district_name' => 'Vadodara'],
            ['state_id' => 24, 'district_name' => 'Valsad'],
        ]);
        // for Daman & Diu states now defunct
        State::create(['state_code' => 25, 'state_name' => 'OLD Daman & Diu']);
        // District::insert([
        //     ['state_id' => 25, 'district_name' => 'Daman'],
        //     ['state_id' => 25, 'district_name' => 'Diu'],
        // ]);
        // for Dadra & Nagar Haveli and Daman & Diu' states
        $state=State::create(['state_code' => 26, 'state_name' => 'Dadra & Nagar Haveli and Daman & Diu']);
        District::insert([
            ['state_id' => 26, 'district_name' => 'Dadra & Nagar Haveli'],
            ['state_id' => 26, 'district_name' => 'Daman'],
            ['state_id' => 26, 'district_name' => 'Diu'],
        ]);
        // for Maharashtra states
        $state=State::create(['state_code' => 27, 'state_name' => 'Maharashtra']);
        District::insert([
            ['state_id' => 27, 'district_name' => 'Ahmednagar'],
            ['state_id' => 27, 'district_name' => 'Akola'],
            ['state_id' => 27, 'district_name' => 'Amravati'],
            ['state_id' => 27, 'district_name' => 'Aurangabad (Chhatrapati Sambhajinagar)'],
            ['state_id' => 27, 'district_name' => 'Beed'],
            ['state_id' => 27, 'district_name' => 'Bhandara'],
            ['state_id' => 27, 'district_name' => 'Buldhana'],
            ['state_id' => 27, 'district_name' => 'Chandrapur'],
            ['state_id' => 27, 'district_name' => 'Dhule'],
            ['state_id' => 27, 'district_name' => 'Gadchiroli'],
            ['state_id' => 27, 'district_name' => 'Gondia'],
            ['state_id' => 27, 'district_name' => 'Hingoli'],
            ['state_id' => 27, 'district_name' => 'Jalgaon'],
            ['state_id' => 27, 'district_name' => 'Jalna'],
            ['state_id' => 27, 'district_name' => 'Kolhapur'],
            ['state_id' => 27, 'district_name' => 'Latur'],
            ['state_id' => 27, 'district_name' => 'Mumbai City'],
            ['state_id' => 27, 'district_name' => 'Mumbai Suburban'],
            ['state_id' => 27, 'district_name' => 'Nagpur'],
            ['state_id' => 27, 'district_name' => 'Nanded'],
            ['state_id' => 27, 'district_name' => 'Nandurbar'],
            ['state_id' => 27, 'district_name' => 'Nashik'],
            ['state_id' => 27, 'district_name' => 'Osmanabad (Dharashiv)'],
            ['state_id' => 27, 'district_name' => 'Palghar'],
            ['state_id' => 27, 'district_name' => 'Parbhani'],
            ['state_id' => 27, 'district_name' => 'Pune'],
            ['state_id' => 27, 'district_name' => 'Raigad'],
            ['state_id' => 27, 'district_name' => 'Ratnagiri'],
            ['state_id' => 27, 'district_name' => 'Sangli'],
            ['state_id' => 27, 'district_name' => 'Satara'],
            ['state_id' => 27, 'district_name' => 'Sindhudurg'],
            ['state_id' => 27, 'district_name' => 'Solapur'],
            ['state_id' => 27, 'district_name' => 'Thane'],
            ['state_id' => 27, 'district_name' => 'Wardha'],
            ['state_id' => 27, 'district_name' => 'Washim'],
            ['state_id' => 27, 'district_name' => 'Yavatmal'],
        ]);
        // for Andhra Pradesh states
        $state=State::create(['state_code' => 28, 'state_name' => 'Andhra Pradesh']);
        District::insert([
            ['state_id' => 28, 'district_name' => 'Alluri Sitharama Raju'],
            ['state_id' => 28, 'district_name' => 'Anakapalli'],
            ['state_id' => 28, 'district_name' => 'Ananthapuramu'],
            ['state_id' => 28, 'district_name' => 'Annamayya'],
            ['state_id' => 28, 'district_name' => 'Bapatla'],
            ['state_id' => 28, 'district_name' => 'Chittoor'],
            ['state_id' => 28, 'district_name' => 'East Godavari'],
            ['state_id' => 28, 'district_name' => 'Eluru'],
            ['state_id' => 28, 'district_name' => 'Guntur'],
            ['state_id' => 28, 'district_name' => 'Kakinada'],
            ['state_id' => 28, 'district_name' => 'Konaseema'],
            ['state_id' => 28, 'district_name' => 'Krishna'],
            ['state_id' => 28, 'district_name' => 'Kurnool'],
            ['state_id' => 28, 'district_name' => 'Nandyal'],
            ['state_id' => 28, 'district_name' => 'Nellore (Sri Potti Sriramulu Nellore)'],
            ['state_id' => 28, 'district_name' => 'NTR'],
            ['state_id' => 28, 'district_name' => 'Palnadu'],
            ['state_id' => 28, 'district_name' => 'Parvathipuram Manyam'],
            ['state_id' => 28, 'district_name' => 'Prakasam'],
            ['state_id' => 28, 'district_name' => 'Srikakulam'],
            ['state_id' => 28, 'district_name' => 'Tirupati'],
            ['state_id' => 28, 'district_name' => 'Visakhapatnam'],
            ['state_id' => 28, 'district_name' => 'Vizianagaram'],
            ['state_id' => 28, 'district_name' => 'West Godavari'],
            ['state_id' => 28, 'district_name' => 'YSR (Kadapa)'],
            ['state_id' => 28, 'district_name' => 'Kona Seema'],
        ]);
        // for Karnataka states
        $state=State::create(['state_code' => 29, 'state_name' => 'Karnataka']);
        District::insert([
            ['state_id' => 29, 'district_name' => 'Bagalkote'],
            ['state_id' => 29, 'district_name' => 'Ballari (Bellary)'],
            ['state_id' => 29, 'district_name' => 'Belagavi (Belgaum)'],
            ['state_id' => 29, 'district_name' => 'Bengaluru Rural'],
            ['state_id' => 29, 'district_name' => 'Bengaluru Urban'],
            ['state_id' => 29, 'district_name' => 'Bidar'],
            ['state_id' => 29, 'district_name' => 'Chamarajanagar'],
            ['state_id' => 29, 'district_name' => 'Chikballapur'],
            ['state_id' => 29, 'district_name' => 'Chikkamagaluru (Chikmagalur)'],
            ['state_id' => 29, 'district_name' => 'Chitradurga'],
            ['state_id' => 29, 'district_name' => 'Dakshina Kannada'],
            ['state_id' => 29, 'district_name' => 'Davanagere'],
            ['state_id' => 29, 'district_name' => 'Dharwad'],
            ['state_id' => 29, 'district_name' => 'Gadag'],
            ['state_id' => 29, 'district_name' => 'Hassan'],
            ['state_id' => 29, 'district_name' => 'Haveri'],
            ['state_id' => 29, 'district_name' => 'Kalaburagi (Gulbarga)'],
            ['state_id' => 29, 'district_name' => 'Kodagu (Coorg)'],
            ['state_id' => 29, 'district_name' => 'Kolar'],
            ['state_id' => 29, 'district_name' => 'Koppal'],
            ['state_id' => 29, 'district_name' => 'Mandya'],
            ['state_id' => 29, 'district_name' => 'Mysuru (Mysore)'],
            ['state_id' => 29, 'district_name' => 'Raichur'],
            ['state_id' => 29, 'district_name' => 'Ramanagara'],
            ['state_id' => 29, 'district_name' => 'Shivamogga (Shimoga)'],
            ['state_id' => 29, 'district_name' => 'Tumakuru (Tumkur)'],
            ['state_id' => 29, 'district_name' => 'Udupi'],
            ['state_id' => 29, 'district_name' => 'Uttara Kannada (Karwar)'],
            ['state_id' => 29, 'district_name' => 'Vijayapura (Bijapur)'],
            ['state_id' => 29, 'district_name' => 'Vijayanagara'],
            ['state_id' => 29, 'district_name' => 'Yadgir'],
        ]);
        // for Goa
        $state=State::create(['state_code' => 30, 'state_name' => 'Goa']);
        District::insert([
            ['state_id' => 30, 'district_name' => 'North Goa'],
            ['state_id' => 30, 'district_name' => 'South Goa'],
        ]);
        // for Lakshadweep states
        $state=State::create(['state_code' => 31, 'state_name' => 'Lakshadweep']);
        District::insert([
            ['state_id' => 31, 'district_name' => 'Lakshadweep'],
        ]);
        // for Kerala states
        $state=State::create(['state_code' => 32, 'state_name' => 'Kerala']);
        District::insert([
            ['state_id' => 32, 'district_name' => 'Alappuzha'],
            ['state_id' => 32, 'district_name' => 'Ernakulam'],
            ['state_id' => 32, 'district_name' => 'Idukki'],
            ['state_id' => 32, 'district_name' => 'Kannur'],
            ['state_id' => 32, 'district_name' => 'Kasaragod'],
            ['state_id' => 32, 'district_name' => 'Kollam'],
            ['state_id' => 32, 'district_name' => 'Kottayam'],
            ['state_id' => 32, 'district_name' => 'Kozhikode'],
            ['state_id' => 32, 'district_name' => 'Malappuram'],
            ['state_id' => 32, 'district_name' => 'Palakkad'],
            ['state_id' => 32, 'district_name' => 'Pathanamthitta'],
            ['state_id' => 32, 'district_name' => 'Thiruvananthapuram'],
            ['state_id' => 32, 'district_name' => 'Thrissur'],
            ['state_id' => 32, 'district_name' => 'Wayanad'],
        ]);
        // for Tamil Nadu states
        $state=State::create(['state_code' => 33, 'state_name' => 'Tamil Nadu']);
        District::insert([
            ['state_id' => 33, 'district_name' => 'Ariyalur'],
            ['state_id' => 33, 'district_name' => 'Chengalpattu'],
            ['state_id' => 33, 'district_name' => 'Chennai'],
            ['state_id' => 33, 'district_name' => 'Coimbatore'],
            ['state_id' => 33, 'district_name' => 'Cuddalore'],
            ['state_id' => 33, 'district_name' => 'Dharmapuri'],
            ['state_id' => 33, 'district_name' => 'Dindigul'],
            ['state_id' => 33, 'district_name' => 'Erode'],
            ['state_id' => 33, 'district_name' => 'Kallakurichi'],
            ['state_id' => 33, 'district_name' => 'Kancheepuram'],
            ['state_id' => 33, 'district_name' => 'Karur'],
            ['state_id' => 33, 'district_name' => 'Krishnagiri'],
            ['state_id' => 33, 'district_name' => 'Madurai'],
            ['state_id' => 33, 'district_name' => 'Mayiladuthurai'],
            ['state_id' => 33, 'district_name' => 'Nagapattinam'],
            ['state_id' => 33, 'district_name' => 'Namakkal'],
            ['state_id' => 33, 'district_name' => 'Nilgiris'],
            ['state_id' => 33, 'district_name' => 'Perambalur'],
            ['state_id' => 33, 'district_name' => 'Pudukkottai'],
            ['state_id' => 33, 'district_name' => 'Ramanathapuram'],
            ['state_id' => 33, 'district_name' => 'Ranipet'],
            ['state_id' => 33, 'district_name' => 'Salem'],
            ['state_id' => 33, 'district_name' => 'Sivaganga'],
            ['state_id' => 33, 'district_name' => 'Tenkasi'],
            ['state_id' => 33, 'district_name' => 'Thanjavur'],
            ['state_id' => 33, 'district_name' => 'Theni'],
            ['state_id' => 33, 'district_name' => 'Thoothukudi (Tuticorin)'],
            ['state_id' => 33, 'district_name' => 'Tiruchirappalli'],
            ['state_id' => 33, 'district_name' => 'Tirunelveli'],
            ['state_id' => 33, 'district_name' => 'Tirupathur'],
            ['state_id' => 33, 'district_name' => 'Tiruppur'],
            ['state_id' => 33, 'district_name' => 'Tiruvallur'],
            ['state_id' => 33, 'district_name' => 'Tiruvannamalai'],
            ['state_id' => 33, 'district_name' => 'Tiruvarur'],
            ['state_id' => 33, 'district_name' => 'Vellore'],
            ['state_id' => 33, 'district_name' => 'Viluppuram'],
            ['state_id' => 33, 'district_name' => 'Virudhunagar'],
        ]);
        // for Puducherry states
        $state=State::create(['state_code' => 34, 'state_name' => 'Puducherry']);
        District::insert([
            ['state_id' => 34, 'district_name' => 'Puducherry'],
            ['state_id' => 34, 'district_name' => 'Karaikal'],
            ['state_id' => 34, 'district_name' => 'Mahe'],
            ['state_id' => 34, 'district_name' => 'Yanam'],
        ]);
        // for Andaman and Nicobar Islands states
        $state=State::create(['state_code' => 35, 'state_name' => 'Andaman and Nicobar Islands']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Nicobar'],
            ['state_id' => $state->id, 'district_name' => 'North and Middle Andaman'],
            ['state_id' => $state->id, 'district_name' => 'South Andaman'],
        ]);
        // for Telangana states
        $state=State::create(['state_code' => 36, 'state_name' => 'Telangana']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Adilabad'],
            ['state_id' => $state->id, 'district_name' => 'Bhadradri Kothagudem'],
            ['state_id' => $state->id, 'district_name' => 'Hanumakonda'],
            ['state_id' => $state->id, 'district_name' => 'Hyderabad'],
            ['state_id' => $state->id, 'district_name' => 'Jagtial'],
            ['state_id' => $state->id, 'district_name' => 'Jangaon'],
            ['state_id' => $state->id, 'district_name' => 'Jayashankar Bhupalpally'],
            ['state_id' => $state->id, 'district_name' => 'Jogulamba Gadwal'],
            ['state_id' => $state->id, 'district_name' => 'Kamareddy'],
            ['state_id' => $state->id, 'district_name' => 'Karimnagar'],
            ['state_id' => $state->id, 'district_name' => 'Khammam'],
            ['state_id' => $state->id, 'district_name' => 'Kumuram Bheem Asifabad'],
            ['state_id' => $state->id, 'district_name' => 'Mahabubabad'],
            ['state_id' => $state->id, 'district_name' => 'Mahabubnagar'],
            ['state_id' => $state->id, 'district_name' => 'Mancherial'],
            ['state_id' => $state->id, 'district_name' => 'Medak'],
            ['state_id' => $state->id, 'district_name' => 'Medchal–Malkajgiri'],
            ['state_id' => $state->id, 'district_name' => 'Mulugu'],
            ['state_id' => $state->id, 'district_name' => 'Nagarkurnool'],
            ['state_id' => $state->id, 'district_name' => 'Nalgonda'],
            ['state_id' => $state->id, 'district_name' => 'Narayanpet'],
            ['state_id' => $state->id, 'district_name' => 'Nirmal'],
            ['state_id' => $state->id, 'district_name' => 'Nizamabad'],
            ['state_id' => $state->id, 'district_name' => 'Peddapalli'],
            ['state_id' => $state->id, 'district_name' => 'Rajanna Sircilla'],
            ['state_id' => $state->id, 'district_name' => 'Ranga Reddy'],
            ['state_id' => $state->id, 'district_name' => 'Sangareddy'],
            ['state_id' => $state->id, 'district_name' => 'Siddipet'],
            ['state_id' => $state->id, 'district_name' => 'Suryapet'],
            ['state_id' => $state->id, 'district_name' => 'Vikarabad'],
            ['state_id' => $state->id, 'district_name' => 'Wanaparthy'],
            ['state_id' => $state->id, 'district_name' => 'Warangal'],
            ['state_id' => $state->id, 'district_name' => 'Yadadri Bhuvanagiri'],
        ]);
        // for Ladakh states
        $state=State::create(['state_code' => 37, 'state_name' => 'Ladakh']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Kargil'],
            ['state_id' => $state->id, 'district_name' => 'Leh'],
        ]);


















    }
}
