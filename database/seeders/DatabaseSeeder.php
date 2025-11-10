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
use App\Models\Course;
use App\Models\CourseStatus;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            ['employee_name' => 'Sachin Tendulkar', 'mobile' => '9836444999', 'email' => 'bangle312@gmail.com', 'department_id' => 3, 'designation_id' => 3],
            ['employee_name' => 'Sukanta Hui', 'mobile' => '7003756860', 'email' => 'sukantahui@gmail.com', 'department_id' => 2, 'designation_id' => 2],
            ['employee_name' => 'Saheb Ghosh', 'mobile' => '8334869999', 'email' => 'sahebghosh89@gmail.com', 'department_id' => 4, 'designation_id' => 4]
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
        $state = State::create(['state_code' => 1, 'state_name' => 'Jammu & Kashmir']);
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
        $state = State::create(['state_code' => 2, 'state_name' => 'Himachal Pradesh']);
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
        $state = State::create(['state_code' => 3, 'state_name' => 'Punjab']);
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
        $state = State::create(['state_code' => 4, 'state_name' => 'Chandigarh']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Chandigarh'],
        ]);
        // for Uttarakhand states
        $state = State::create(['state_code' => 5, 'state_name' => 'Uttarakhand']);
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
        $state = State::create(['state_code' => 6, 'state_name' => 'Haryana']);
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
        $state = State::create(['state_code' => 7, 'state_name' => 'Delhi']);
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
        $state = State::create(['state_code' => 8, 'state_name' => 'Rajasthan']);
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
        $state = State::create(['state_code' => 9, 'state_name' => 'Uttar Pradesh']);
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
        $state = State::create(['state_code' => 10, 'state_name' => 'Bihar']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Araria'],
            ['state_id' => $state->id, 'district_name' => 'Arwal'],
            ['state_id' => $state->id, 'district_name' => 'Aurangabad'],
            ['state_id' => $state->id, 'district_name' => 'Banka'],
            ['state_id' => $state->id, 'district_name' => 'Begusarai'],
            ['state_id' => $state->id, 'district_name' => 'Bhagalpur'],
            ['state_id' => $state->id, 'district_name' => 'Bhojpur'],
            ['state_id' => $state->id, 'district_name' => 'Buxar'],
            ['state_id' => $state->id, 'district_name' => 'Darbhanga'],
            ['state_id' => $state->id, 'district_name' => 'East Champaran (Motihari)'],
            ['state_id' => $state->id, 'district_name' => 'Gaya'],
            ['state_id' => $state->id, 'district_name' => 'Gopalganj'],
            ['state_id' => $state->id, 'district_name' => 'Jamui'],
            ['state_id' => $state->id, 'district_name' => 'Jehanabad'],
            ['state_id' => $state->id, 'district_name' => 'Kaimur (Bhabua)'],
            ['state_id' => $state->id, 'district_name' => 'Katihar'],
            ['state_id' => $state->id, 'district_name' => 'Khagaria'],
            ['state_id' => $state->id, 'district_name' => 'Kishanganj'],
            ['state_id' => $state->id, 'district_name' => 'Lakhisarai'],
            ['state_id' => $state->id, 'district_name' => 'Madhepura'],
            ['state_id' => $state->id, 'district_name' => 'Madhubani'],
            ['state_id' => $state->id, 'district_name' => 'Munger'],
            ['state_id' => $state->id, 'district_name' => 'Muzaffarpur'],
            ['state_id' => $state->id, 'district_name' => 'Nalanda'],
            ['state_id' => $state->id, 'district_name' => 'Nawada'],
            ['state_id' => $state->id, 'district_name' => 'Patna'],
            ['state_id' => $state->id, 'district_name' => 'Purnia'],
            ['state_id' => $state->id, 'district_name' => 'Rohtas'],
            ['state_id' => $state->id, 'district_name' => 'Saharsa'],
            ['state_id' => $state->id, 'district_name' => 'Samastipur'],
            ['state_id' => $state->id, 'district_name' => 'Saran'],
            ['state_id' => $state->id, 'district_name' => 'Sheikhpura'],
            ['state_id' => $state->id, 'district_name' => 'Sheohar'],
            ['state_id' => $state->id, 'district_name' => 'Sitamarhi'],
            ['state_id' => $state->id, 'district_name' => 'Siwan'],
            ['state_id' => $state->id, 'district_name' => 'Supaul'],
            ['state_id' => $state->id, 'district_name' => 'Vaishali'],
            ['state_id' => $state->id, 'district_name' => 'West Champaran (Bettiah)'],
        ]);

        // for Sikkim states
        $state = State::create(['state_code' => 11, 'state_name' => 'Sikkim']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Gangtok'],
            ['state_id' => $state->id, 'district_name' => 'Namchi'],
            ['state_id' => $state->id, 'district_name' => 'Mangan'],
            ['state_id' => $state->id, 'district_name' => 'Gyalshing'],
            ['state_id' => $state->id, 'district_name' => 'Soreng'],
            ['state_id' => $state->id, 'district_name' => 'Pakyong'],
        ]);

        // for Arunachal Pradesh states
        $state = State::create(['state_code' => 12, 'state_name' => 'Arunachal Pradesh']);
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
        $state = State::create(['state_code' => 13, 'state_name' => 'Nagaland']);
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
        $state = State::create(['state_code' => 14, 'state_name' => 'Manipur']);
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
        $state = State::create(['state_code' => 15, 'state_name' => 'Mizoram']);
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
        $state = State::create(['state_code' => 16, 'state_name' => 'Tripura']);
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
        $state = State::create(['state_code' => 19, 'state_name' => 'West Bengal']);
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
        $state = State::create(['state_code' => 20, 'state_name' => 'Jharkhand']);
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
        $state = State::create(['state_code' => 21, 'state_name' => 'Odisha']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Angul'],
            ['state_id' => $state->id, 'district_name' => 'Balangir'],
            ['state_id' => $state->id, 'district_name' => 'Balasore'],
            ['state_id' => $state->id, 'district_name' => 'Bargarh'],
            ['state_id' => $state->id, 'district_name' => 'Bhadrak'],
            ['state_id' => $state->id, 'district_name' => 'Boudh'],
            ['state_id' => $state->id, 'district_name' => 'Cuttack'],
            ['state_id' => $state->id, 'district_name' => 'Deogarh'],
            ['state_id' => $state->id, 'district_name' => 'Dhenkanal'],
            ['state_id' => $state->id, 'district_name' => 'Gajapati'],
            ['state_id' => $state->id, 'district_name' => 'Ganjam'],
            ['state_id' => $state->id, 'district_name' => 'Jagatsinghpur'],
            ['state_id' => $state->id, 'district_name' => 'Jajpur'],
            ['state_id' => $state->id, 'district_name' => 'Jharsuguda'],
            ['state_id' => $state->id, 'district_name' => 'Kalahandi'],
            ['state_id' => $state->id, 'district_name' => 'Kandhamal'],
            ['state_id' => $state->id, 'district_name' => 'Kendrapara'],
            ['state_id' => $state->id, 'district_name' => 'Kendujhar (Keonjhar)'],
            ['state_id' => $state->id, 'district_name' => 'Khordha'],
            ['state_id' => $state->id, 'district_name' => 'Koraput'],
            ['state_id' => $state->id, 'district_name' => 'Malkangiri'],
            ['state_id' => $state->id, 'district_name' => 'Mayurbhanj'],
            ['state_id' => $state->id, 'district_name' => 'Nabarangpur'],
            ['state_id' => $state->id, 'district_name' => 'Nayagarh'],
            ['state_id' => $state->id, 'district_name' => 'Nuapada'],
            ['state_id' => $state->id, 'district_name' => 'Puri'],
            ['state_id' => $state->id, 'district_name' => 'Rayagada'],
            ['state_id' => $state->id, 'district_name' => 'Sambalpur'],
            ['state_id' => $state->id, 'district_name' => 'Subarnapur (Sonepur)'],
            ['state_id' => $state->id, 'district_name' => 'Sundargarh'],
        ]);

        // for Chhattisgarh states
        $state = State::create(['state_code' => 22, 'state_name' => 'Chhattisgarh']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Balod'],
            ['state_id' => $state->id, 'district_name' => 'Baloda Bazar'],
            ['state_id' => $state->id, 'district_name' => 'Balrampur CG'],
            ['state_id' => $state->id, 'district_name' => 'Bastar'],
            ['state_id' => $state->id, 'district_name' => 'Bemetara'],
            ['state_id' => $state->id, 'district_name' => 'Bijapur'],
            ['state_id' => $state->id, 'district_name' => 'Bilaspur CG'],
            ['state_id' => $state->id, 'district_name' => 'Dantewada (South Bastar)'],
            ['state_id' => $state->id, 'district_name' => 'Dhamtari'],
            ['state_id' => $state->id, 'district_name' => 'Durg'],
            ['state_id' => $state->id, 'district_name' => 'Gariaband'],
            ['state_id' => $state->id, 'district_name' => 'Gaurela-Pendra-Marwahi'],
            ['state_id' => $state->id, 'district_name' => 'Janjgir-Champa'],
            ['state_id' => $state->id, 'district_name' => 'Jashpur'],
            ['state_id' => $state->id, 'district_name' => 'Kabirdham (Kawardha)'],
            ['state_id' => $state->id, 'district_name' => 'Kanker (North Bastar)'],
            ['state_id' => $state->id, 'district_name' => 'Kondagaon'],
            ['state_id' => $state->id, 'district_name' => 'Korba'],
            ['state_id' => $state->id, 'district_name' => 'Koriya'],
            ['state_id' => $state->id, 'district_name' => 'Mahasamund'],
            ['state_id' => $state->id, 'district_name' => 'Mungeli'],
            ['state_id' => $state->id, 'district_name' => 'Narayanpur'],
            ['state_id' => $state->id, 'district_name' => 'Raigarh'],
            ['state_id' => $state->id, 'district_name' => 'Raipur'],
            ['state_id' => $state->id, 'district_name' => 'Rajnandgaon'],
            ['state_id' => $state->id, 'district_name' => 'Sukma'],
            ['state_id' => $state->id, 'district_name' => 'Surajpur'],
            ['state_id' => $state->id, 'district_name' => 'Surguja'],
            ['state_id' => $state->id, 'district_name' => 'Balrampur-Ramanujganj'],
            ['state_id' => $state->id, 'district_name' => 'Manendragarh-Chirmiri-Bharatpur'],
            ['state_id' => $state->id, 'district_name' => 'Sarangarh-Bilaigarh'],
            ['state_id' => $state->id, 'district_name' => 'Mohla-Manpur-Ambagarh Chowki'],
            ['state_id' => $state->id, 'district_name' => 'Khairagarh-Chhuikhadan-Gandai'],
        ]);

        // for Madhya Pradesh states  
        $state = State::create(['state_code' => 23, 'state_name' => 'Madhya Pradesh']);
        // for Madhya Pradesh state
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Agar Malwa'],
            ['state_id' => $state->id, 'district_name' => 'Alirajpur'],
            ['state_id' => $state->id, 'district_name' => 'Anuppur'],
            ['state_id' => $state->id, 'district_name' => 'Ashoknagar'],
            ['state_id' => $state->id, 'district_name' => 'Balaghat'],
            ['state_id' => $state->id, 'district_name' => 'Barwani'],
            ['state_id' => $state->id, 'district_name' => 'Betul'],
            ['state_id' => $state->id, 'district_name' => 'Bhind'],
            ['state_id' => $state->id, 'district_name' => 'Bhopal'],
            ['state_id' => $state->id, 'district_name' => 'Burhanpur'],
            ['state_id' => $state->id, 'district_name' => 'Chhatarpur'],
            ['state_id' => $state->id, 'district_name' => 'Chhindwara'],
            ['state_id' => $state->id, 'district_name' => 'Damoh'],
            ['state_id' => $state->id, 'district_name' => 'Datia'],
            ['state_id' => $state->id, 'district_name' => 'Dewas'],
            ['state_id' => $state->id, 'district_name' => 'Dhar'],
            ['state_id' => $state->id, 'district_name' => 'Dindori'],
            ['state_id' => $state->id, 'district_name' => 'Guna'],
            ['state_id' => $state->id, 'district_name' => 'Gwalior'],
            ['state_id' => $state->id, 'district_name' => 'Harda'],
            ['state_id' => $state->id, 'district_name' => 'Hoshangabad (Narmadapuram)'],
            ['state_id' => $state->id, 'district_name' => 'Indore'],
            ['state_id' => $state->id, 'district_name' => 'Jabalpur'],
            ['state_id' => $state->id, 'district_name' => 'Jhabua'],
            ['state_id' => $state->id, 'district_name' => 'Katni'],
            ['state_id' => $state->id, 'district_name' => 'Khandwa (East Nimar)'],
            ['state_id' => $state->id, 'district_name' => 'Khargone (West Nimar)'],
            ['state_id' => $state->id, 'district_name' => 'Mandla'],
            ['state_id' => $state->id, 'district_name' => 'Mandsaur'],
            ['state_id' => $state->id, 'district_name' => 'Morena'],
            ['state_id' => $state->id, 'district_name' => 'Narsinghpur'],
            ['state_id' => $state->id, 'district_name' => 'Neemuch'],
            ['state_id' => $state->id, 'district_name' => 'Niwari'],
            ['state_id' => $state->id, 'district_name' => 'Panna'],
            ['state_id' => $state->id, 'district_name' => 'Raisen'],
            ['state_id' => $state->id, 'district_name' => 'Rajgarh'],
            ['state_id' => $state->id, 'district_name' => 'Ratlam'],
            ['state_id' => $state->id, 'district_name' => 'Rewa'],
            ['state_id' => $state->id, 'district_name' => 'Sagar'],
            ['state_id' => $state->id, 'district_name' => 'Satna'],
            ['state_id' => $state->id, 'district_name' => 'Sehore'],
            ['state_id' => $state->id, 'district_name' => 'Seoni'],
            ['state_id' => $state->id, 'district_name' => 'Shahdol'],
            ['state_id' => $state->id, 'district_name' => 'Shajapur'],
            ['state_id' => $state->id, 'district_name' => 'Sheopur'],
            ['state_id' => $state->id, 'district_name' => 'Shivpuri'],
            ['state_id' => $state->id, 'district_name' => 'Sidhi'],
            ['state_id' => $state->id, 'district_name' => 'Singrauli'],
            ['state_id' => $state->id, 'district_name' => 'Tikamgarh'],
            ['state_id' => $state->id, 'district_name' => 'Ujjain'],
            ['state_id' => $state->id, 'district_name' => 'Umaria'],
            ['state_id' => $state->id, 'district_name' => 'Vidisha'],
            ['state_id' => $state->id, 'district_name' => 'Maihar'],
            ['state_id' => $state->id, 'district_name' => 'Nagda'],
            ['state_id' => $state->id, 'district_name' => 'Sailana'],
        ]);


        // for Gujarat states
        $state = State::create(['state_code' => 24, 'state_name' => 'Gujarat']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Ahmedabad'],
            ['state_id' => $state->id, 'district_name' => 'Amreli'],
            ['state_id' => $state->id, 'district_name' => 'Anand'],
            ['state_id' => $state->id, 'district_name' => 'Aravalli'],
            ['state_id' => $state->id, 'district_name' => 'Banaskantha (Palanpur)'],
            ['state_id' => $state->id, 'district_name' => 'Bharuch'],
            ['state_id' => $state->id, 'district_name' => 'Bhavnagar'],
            ['state_id' => $state->id, 'district_name' => 'Botad'],
            ['state_id' => $state->id, 'district_name' => 'Chhota Udepur'],
            ['state_id' => $state->id, 'district_name' => 'Dahod'],
            ['state_id' => $state->id, 'district_name' => 'Dang (Ahwa)'],
            ['state_id' => $state->id, 'district_name' => 'Devbhoomi Dwarka'],
            ['state_id' => $state->id, 'district_name' => 'Gandhinagar'],
            ['state_id' => $state->id, 'district_name' => 'Gir Somnath'],
            ['state_id' => $state->id, 'district_name' => 'Jamnagar'],
            ['state_id' => $state->id, 'district_name' => 'Junagadh'],
            ['state_id' => $state->id, 'district_name' => 'Kheda (Nadiad)'],
            ['state_id' => $state->id, 'district_name' => 'Kutch (Bhuj)'],
            ['state_id' => $state->id, 'district_name' => 'Mahisagar'],
            ['state_id' => $state->id, 'district_name' => 'Mehsana'],
            ['state_id' => $state->id, 'district_name' => 'Morbi'],
            ['state_id' => $state->id, 'district_name' => 'Narmada (Rajpipla)'],
            ['state_id' => $state->id, 'district_name' => 'Navsari'],
            ['state_id' => $state->id, 'district_name' => 'Panchmahal (Godhra)'],
            ['state_id' => $state->id, 'district_name' => 'Patan'],
            ['state_id' => $state->id, 'district_name' => 'Porbandar'],
            ['state_id' => $state->id, 'district_name' => 'Rajkot'],
            ['state_id' => $state->id, 'district_name' => 'Sabarkantha (Himmatnagar)'],
            ['state_id' => $state->id, 'district_name' => 'Surat'],
            ['state_id' => $state->id, 'district_name' => 'Surendranagar'],
            ['state_id' => $state->id, 'district_name' => 'Tapi (Vyara)'],
            ['state_id' => $state->id, 'district_name' => 'Vadodara'],
            ['state_id' => $state->id, 'district_name' => 'Valsad'],
        ]);
        // for Daman & Diu states now defunct
        State::create(['state_code' => 25, 'state_name' => 'OLD Daman & Diu']);
        // District::insert([
        //     ['state_id' => 25, 'district_name' => 'Daman'],
        //     ['state_id' => 25, 'district_name' => 'Diu'],
        // ]);
        // for Dadra & Nagar Haveli and Daman & Diu' states
        $state = State::create(['state_code' => 26, 'state_name' => 'Dadra & Nagar Haveli and Daman & Diu']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Dadra & Nagar Haveli'],
            ['state_id' => $state->id, 'district_name' => 'Daman'],
            ['state_id' => $state->id, 'district_name' => 'Diu'],
        ]);
        // for Maharashtra states
        $state = State::create(['state_code' => 27, 'state_name' => 'Maharashtra']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Ahmednagar'],
            ['state_id' => $state->id, 'district_name' => 'Akola'],
            ['state_id' => $state->id, 'district_name' => 'Amravati'],
            ['state_id' => $state->id, 'district_name' => 'Aurangabad (Chhatrapati Sambhajinagar)'],
            ['state_id' => $state->id, 'district_name' => 'Beed'],
            ['state_id' => $state->id, 'district_name' => 'Bhandara'],
            ['state_id' => $state->id, 'district_name' => 'Buldhana'],
            ['state_id' => $state->id, 'district_name' => 'Chandrapur'],
            ['state_id' => $state->id, 'district_name' => 'Dhule'],
            ['state_id' => $state->id, 'district_name' => 'Gadchiroli'],
            ['state_id' => $state->id, 'district_name' => 'Gondia'],
            ['state_id' => $state->id, 'district_name' => 'Hingoli'],
            ['state_id' => $state->id, 'district_name' => 'Jalgaon'],
            ['state_id' => $state->id, 'district_name' => 'Jalna'],
            ['state_id' => $state->id, 'district_name' => 'Kolhapur'],
            ['state_id' => $state->id, 'district_name' => 'Latur'],
            ['state_id' => $state->id, 'district_name' => 'Mumbai City'],
            ['state_id' => $state->id, 'district_name' => 'Mumbai Suburban'],
            ['state_id' => $state->id, 'district_name' => 'Nagpur'],
            ['state_id' => $state->id, 'district_name' => 'Nanded'],
            ['state_id' => $state->id, 'district_name' => 'Nandurbar'],
            ['state_id' => $state->id, 'district_name' => 'Nashik'],
            ['state_id' => $state->id, 'district_name' => 'Osmanabad (Dharashiv)'],
            ['state_id' => $state->id, 'district_name' => 'Palghar'],
            ['state_id' => $state->id, 'district_name' => 'Parbhani'],
            ['state_id' => $state->id, 'district_name' => 'Pune'],
            ['state_id' => $state->id, 'district_name' => 'Raigad'],
            ['state_id' => $state->id, 'district_name' => 'Ratnagiri'],
            ['state_id' => $state->id, 'district_name' => 'Sangli'],
            ['state_id' => $state->id, 'district_name' => 'Satara'],
            ['state_id' => $state->id, 'district_name' => 'Sindhudurg'],
            ['state_id' => $state->id, 'district_name' => 'Solapur'],
            ['state_id' => $state->id, 'district_name' => 'Thane'],
            ['state_id' => $state->id, 'district_name' => 'Wardha'],
            ['state_id' => $state->id, 'district_name' => 'Washim'],
            ['state_id' => $state->id, 'district_name' => 'Yavatmal'],
        ]);
        // for Andhra Pradesh states
        $state = State::create(['state_code' => 28, 'state_name' => 'Andhra Pradesh']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Alluri Sitharama Raju'],
            ['state_id' => $state->id, 'district_name' => 'Anakapalli'],
            ['state_id' => $state->id, 'district_name' => 'Ananthapuramu'],
            ['state_id' => $state->id, 'district_name' => 'Annamayya'],
            ['state_id' => $state->id, 'district_name' => 'Bapatla'],
            ['state_id' => $state->id, 'district_name' => 'Chittoor'],
            ['state_id' => $state->id, 'district_name' => 'East Godavari'],
            ['state_id' => $state->id, 'district_name' => 'Eluru'],
            ['state_id' => $state->id, 'district_name' => 'Guntur'],
            ['state_id' => $state->id, 'district_name' => 'Kakinada'],
            ['state_id' => $state->id, 'district_name' => 'Konaseema'],
            ['state_id' => $state->id, 'district_name' => 'Krishna'],
            ['state_id' => $state->id, 'district_name' => 'Kurnool'],
            ['state_id' => $state->id, 'district_name' => 'Nandyal'],
            ['state_id' => $state->id, 'district_name' => 'Nellore (Sri Potti Sriramulu Nellore)'],
            ['state_id' => $state->id, 'district_name' => 'NTR'],
            ['state_id' => $state->id, 'district_name' => 'Palnadu'],
            ['state_id' => $state->id, 'district_name' => 'Parvathipuram Manyam'],
            ['state_id' => $state->id, 'district_name' => 'Prakasam'],
            ['state_id' => $state->id, 'district_name' => 'Srikakulam'],
            ['state_id' => $state->id, 'district_name' => 'Tirupati'],
            ['state_id' => $state->id, 'district_name' => 'Visakhapatnam'],
            ['state_id' => $state->id, 'district_name' => 'Vizianagaram'],
            ['state_id' => $state->id, 'district_name' => 'West Godavari'],
            ['state_id' => $state->id, 'district_name' => 'YSR (Kadapa)'],
            ['state_id' => $state->id, 'district_name' => 'Kona Seema'],
        ]);
        // for Karnataka states
        $state = State::create(['state_code' => 29, 'state_name' => 'Karnataka']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Bagalkote'],
            ['state_id' => $state->id, 'district_name' => 'Ballari (Bellary)'],
            ['state_id' => $state->id, 'district_name' => 'Belagavi (Belgaum)'],
            ['state_id' => $state->id, 'district_name' => 'Bengaluru Rural'],
            ['state_id' => $state->id, 'district_name' => 'Bengaluru Urban'],
            ['state_id' => $state->id, 'district_name' => 'Bidar'],
            ['state_id' => $state->id, 'district_name' => 'Chamarajanagar'],
            ['state_id' => $state->id, 'district_name' => 'Chikballapur'],
            ['state_id' => $state->id, 'district_name' => 'Chikkamagaluru (Chikmagalur)'],
            ['state_id' => $state->id, 'district_name' => 'Chitradurga'],
            ['state_id' => $state->id, 'district_name' => 'Dakshina Kannada'],
            ['state_id' => $state->id, 'district_name' => 'Davanagere'],
            ['state_id' => $state->id, 'district_name' => 'Dharwad'],
            ['state_id' => $state->id, 'district_name' => 'Gadag'],
            ['state_id' => $state->id, 'district_name' => 'Hassan'],
            ['state_id' => $state->id, 'district_name' => 'Haveri'],
            ['state_id' => $state->id, 'district_name' => 'Kalaburagi (Gulbarga)'],
            ['state_id' => $state->id, 'district_name' => 'Kodagu (Coorg)'],
            ['state_id' => $state->id, 'district_name' => 'Kolar'],
            ['state_id' => $state->id, 'district_name' => 'Koppal'],
            ['state_id' => $state->id, 'district_name' => 'Mandya'],
            ['state_id' => $state->id, 'district_name' => 'Mysuru (Mysore)'],
            ['state_id' => $state->id, 'district_name' => 'Raichur'],
            ['state_id' => $state->id, 'district_name' => 'Ramanagara'],
            ['state_id' => $state->id, 'district_name' => 'Shivamogga (Shimoga)'],
            ['state_id' => $state->id, 'district_name' => 'Tumakuru (Tumkur)'],
            ['state_id' => $state->id, 'district_name' => 'Udupi'],
            ['state_id' => $state->id, 'district_name' => 'Uttara Kannada (Karwar)'],
            ['state_id' => $state->id, 'district_name' => 'Vijayapura (Bijapur)'],
            ['state_id' => $state->id, 'district_name' => 'Vijayanagara'],
            ['state_id' => $state->id, 'district_name' => 'Yadgir'],
        ]);
        // for Goa
        $state = State::create(['state_code' => 30, 'state_name' => 'Goa']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'North Goa'],
            ['state_id' => $state->id, 'district_name' => 'South Goa'],
        ]);
        // for Lakshadweep states
        $state = State::create(['state_code' => 31, 'state_name' => 'Lakshadweep']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Lakshadweep'],
        ]);
        // for Kerala states
        $state = State::create(['state_code' => 32, 'state_name' => 'Kerala']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Alappuzha'],
            ['state_id' => $state->id, 'district_name' => 'Ernakulam'],
            ['state_id' => $state->id, 'district_name' => 'Idukki'],
            ['state_id' => $state->id, 'district_name' => 'Kannur'],
            ['state_id' => $state->id, 'district_name' => 'Kasaragod'],
            ['state_id' => $state->id, 'district_name' => 'Kollam'],
            ['state_id' => $state->id, 'district_name' => 'Kottayam'],
            ['state_id' => $state->id, 'district_name' => 'Kozhikode'],
            ['state_id' => $state->id, 'district_name' => 'Malappuram'],
            ['state_id' => $state->id, 'district_name' => 'Palakkad'],
            ['state_id' => $state->id, 'district_name' => 'Pathanamthitta'],
            ['state_id' => $state->id, 'district_name' => 'Thiruvananthapuram'],
            ['state_id' => $state->id, 'district_name' => 'Thrissur'],
            ['state_id' => $state->id, 'district_name' => 'Wayanad'],
        ]);
        // for Tamil Nadu states
        $state = State::create(['state_code' => 33, 'state_name' => 'Tamil Nadu']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Ariyalur'],
            ['state_id' => $state->id, 'district_name' => 'Chengalpattu'],
            ['state_id' => $state->id, 'district_name' => 'Chennai'],
            ['state_id' => $state->id, 'district_name' => 'Coimbatore'],
            ['state_id' => $state->id, 'district_name' => 'Cuddalore'],
            ['state_id' => $state->id, 'district_name' => 'Dharmapuri'],
            ['state_id' => $state->id, 'district_name' => 'Dindigul'],
            ['state_id' => $state->id, 'district_name' => 'Erode'],
            ['state_id' => $state->id, 'district_name' => 'Kallakurichi'],
            ['state_id' => $state->id, 'district_name' => 'Kancheepuram'],
            ['state_id' => $state->id, 'district_name' => 'Karur'],
            ['state_id' => $state->id, 'district_name' => 'Krishnagiri'],
            ['state_id' => $state->id, 'district_name' => 'Madurai'],
            ['state_id' => $state->id, 'district_name' => 'Mayiladuthurai'],
            ['state_id' => $state->id, 'district_name' => 'Nagapattinam'],
            ['state_id' => $state->id, 'district_name' => 'Namakkal'],
            ['state_id' => $state->id, 'district_name' => 'Nilgiris'],
            ['state_id' => $state->id, 'district_name' => 'Perambalur'],
            ['state_id' => $state->id, 'district_name' => 'Pudukkottai'],
            ['state_id' => $state->id, 'district_name' => 'Ramanathapuram'],
            ['state_id' => $state->id, 'district_name' => 'Ranipet'],
            ['state_id' => $state->id, 'district_name' => 'Salem'],
            ['state_id' => $state->id, 'district_name' => 'Sivaganga'],
            ['state_id' => $state->id, 'district_name' => 'Tenkasi'],
            ['state_id' => $state->id, 'district_name' => 'Thanjavur'],
            ['state_id' => $state->id, 'district_name' => 'Theni'],
            ['state_id' => $state->id, 'district_name' => 'Thoothukudi (Tuticorin)'],
            ['state_id' => $state->id, 'district_name' => 'Tiruchirappalli'],
            ['state_id' => $state->id, 'district_name' => 'Tirunelveli'],
            ['state_id' => $state->id, 'district_name' => 'Tirupathur'],
            ['state_id' => $state->id, 'district_name' => 'Tiruppur'],
            ['state_id' => $state->id, 'district_name' => 'Tiruvallur'],
            ['state_id' => $state->id, 'district_name' => 'Tiruvannamalai'],
            ['state_id' => $state->id, 'district_name' => 'Tiruvarur'],
            ['state_id' => $state->id, 'district_name' => 'Vellore'],
            ['state_id' => $state->id, 'district_name' => 'Viluppuram'],
            ['state_id' => $state->id, 'district_name' => 'Virudhunagar'],
        ]);
        // for Puducherry states
        $state = State::create(['state_code' => 34, 'state_name' => 'Puducherry']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Puducherry'],
            ['state_id' => $state->id, 'district_name' => 'Karaikal'],
            ['state_id' => $state->id, 'district_name' => 'Mahe'],
            ['state_id' => $state->id, 'district_name' => 'Yanam'],
        ]);
        // for Andaman and Nicobar Islands states
        $state = State::create(['state_code' => 35, 'state_name' => 'Andaman and Nicobar Islands']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Nicobar'],
            ['state_id' => $state->id, 'district_name' => 'North and Middle Andaman'],
            ['state_id' => $state->id, 'district_name' => 'South Andaman'],
        ]);
        // for Telangana states
        $state = State::create(['state_code' => 36, 'state_name' => 'Telangana']);
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
        $state = State::create(['state_code' => 37, 'state_name' => 'Ladakh']);
        District::insert([
            ['state_id' => $state->id, 'district_name' => 'Kargil'],
            ['state_id' => $state->id, 'district_name' => 'Leh'],
        ]);


        //adding courses
        $course = Course::create(['course_code' => 'RDBMS', 'course_name' => 'Relational Database Management System']);
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Database Systems',
                'topic_description' => 'Understanding data, information, and database concepts. Overview of file-based systems and their limitations.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Database Architecture & Data Models',
                'topic_description' => 'Three-level database architecture, data abstraction, data independence, ER model, and relational model overview.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Entity Relationship (ER) Modeling',
                'topic_description' => 'ER diagrams, entities, attributes, relationships, keys, cardinality, and conversion to relational schema.',
                'theory_duration' => 2.5,
                'practical_duration' => 1.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Relational Algebra and Calculus',
                'topic_description' => 'Operations like select, project, join, union, difference, and division. Introduction to tuple and domain relational calculus.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'SQL – Structured Query Language',
                'topic_description' => 'DDL, DML, DCL, TCL commands; constraints; joins; nested queries; aggregate functions; and views.',
                'theory_duration' => 4.0,
                'practical_duration' => 4.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Normalization and Functional Dependencies',
                'topic_description' => 'Concepts of normalization, 1NF to 5NF, BCNF, and identifying anomalies and dependencies.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Transaction Management and Concurrency Control',
                'topic_description' => 'ACID properties, transaction states, serializability, locking, and deadlock handling.',
                'theory_duration' => 3.0,
                'practical_duration' => 1.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Database Recovery and Backup Techniques',
                'topic_description' => 'Recovery techniques, checkpoints, log-based recovery, and backup strategies.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Database Security and Authorization',
                'topic_description' => 'User authentication, privileges, roles, encryption, and SQL injection prevention.',
                'theory_duration' => 2.0,
                'practical_duration' => 0.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'PL/SQL and Stored Procedures',
                'topic_description' => 'Procedural extensions in SQL: variables, cursors, loops, triggers, and stored procedures.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Indexing and Query Optimization',
                'topic_description' => 'B-trees, hashing, cost-based optimization, and use of indexes for performance tuning.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'NoSQL Overview (Optional)',
                'topic_description' => 'Brief comparison between relational and NoSQL databases, document and key-value stores.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 12,
            ],
        ]);

        $course = Course::create(['course_code' => 'JAVA', 'course_name' => 'JAVA Web Technologies']);
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Advanced Java',
                'topic_description' => 'Overview of Core vs Advanced Java, JDK structure, and setup for development with IDEs.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Java Database Connectivity (JDBC)',
                'topic_description' => 'JDBC architecture, connection interface, statements, prepared statements, result sets, and transactions.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Servlets and Web Applications',
                'topic_description' => 'Servlet lifecycle, request/response handling, session management, cookies, and deployment in Tomcat.',
                'theory_duration' => 3.0,
                'practical_duration' => 4.0,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'JavaServer Pages (JSP)',
                'topic_description' => 'JSP lifecycle, implicit objects, directives, JSTL, and JSP-Servlet integration.',
                'theory_duration' => 2.5,
                'practical_duration' => 3.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'JavaBeans and Custom Tags',
                'topic_description' => 'Creating reusable components using JavaBeans and using custom tag libraries in JSP.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Java Networking',
                'topic_description' => 'Working with sockets, URL and InetAddress classes, client-server communication, and multithreading with sockets.',
                'theory_duration' => 2.5,
                'practical_duration' => 2.5,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Remote Method Invocation (RMI)',
                'topic_description' => 'Distributed programming with RMI: remote interfaces, stubs, skeletons, and registry.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Java Message Service (JMS)',
                'topic_description' => 'Messaging concepts, point-to-point vs publish-subscribe models, and message-driven beans.',
                'theory_duration' => 2.5,
                'practical_duration' => 1.5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Spring Framework Basics',
                'topic_description' => 'Introduction to IoC, dependency injection, and using annotations in Spring Core.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Hibernate ORM Framework',
                'topic_description' => 'Object-relational mapping, configuration, session management, CRUD operations, and relationships.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Spring MVC Architecture',
                'topic_description' => 'Model-View-Controller architecture, form handling, validation, and integration with Hibernate.',
                'theory_duration' => 3.0,
                'practical_duration' => 3.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'RESTful Web Services in Java',
                'topic_description' => 'Creating REST APIs using Spring Boot, JSON handling, and HTTP methods.',
                'theory_duration' => 2.5,
                'practical_duration' => 3.0,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Java Security and Authentication',
                'topic_description' => 'User authentication, encryption, SSL, and secure coding practices in Java applications.',
                'theory_duration' => 2.0,
                'practical_duration' => 1.5,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'Project Work',
                'topic_description' => 'Building a full-stack Java web application integrating Servlets, JSP, JDBC, and Spring Boot.',
                'theory_duration' => 1.0,
                'practical_duration' => 6.0,
                'sequence' => 14,
            ],
        ]);
        $course = Course::create(['course_code' => 'Tally01', 'course_name' => 'Tally Prime']);
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Accounting and Tally Prime',
                'topic_description' => 'Overview of accounting principles, need for computerised accounting, introduction to Tally Prime interface and features.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.0,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Company Creation and Configuration',
                'topic_description' => 'Creating, selecting, altering and deleting companies; managing data directories; security and user management.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Fundamentals of Accounting in Tally',
                'topic_description' => 'Understanding Groups, Ledgers, Vouchers, and Double Entry System; creating and managing ledger accounts.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Voucher Entries',
                'topic_description' => 'Recording transactions using different voucher types — Payment, Receipt, Contra, Journal, Sales, and Purchase.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Inventory Management in Tally Prime',
                'topic_description' => 'Stock groups, stock categories, stock items, units of measure, and stock valuation methods.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Bill-wise and Outstanding Management',
                'topic_description' => 'Managing bills receivable and payable, maintaining party balances, and ageing analysis reports.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Banking Features and Reconciliation',
                'topic_description' => 'Bank reconciliation, cheque management, post-dated cheques, and online banking features.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'GST in Tally Prime',
                'topic_description' => 'Introduction to Goods and Services Tax, GST configuration, creating GST ledgers, and filing GST returns using Tally.',
                'theory_duration' => 2.5,
                'practical_duration' => 3.0,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'TDS and TCS Management',
                'topic_description' => 'Configuring and calculating Tax Deducted at Source (TDS) and Tax Collected at Source (TCS) in Tally.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Payroll Management in Tally Prime',
                'topic_description' => 'Enabling payroll, creating employee masters, salary structures, attendance, and payslips.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Budgeting and Scenario Management',
                'topic_description' => 'Creating budgets, defining controls, variance analysis, and using scenarios for forecasting.',
                'theory_duration' => 1.5,
                'practical_duration' => 1.5,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Generating Financial Statements',
                'topic_description' => 'Viewing and customizing Balance Sheet, Profit & Loss Account, Cash Flow, and Ratio Analysis reports.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.0,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Data Management and Security',
                'topic_description' => 'Backup and restore, data migration, password protection, user roles, and audit features.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'Tally Prime Reports and Printing',
                'topic_description' => 'Customizing report views, printing invoices, exporting data, and emailing reports.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 14,
            ],
            [
                'topic_title' => 'Practical Project: Full Business Cycle',
                'topic_description' => 'Recording transactions from company creation to final reports for a sample trading business.',
                'theory_duration' => 0.5,
                'practical_duration' => 5.0,
                'sequence' => 15,
            ],
        ]);
        $course = Course::create(['course_code' => 'Excel-01', 'course_name' => 'Advance Excel']);
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Excel Environment',
                'topic_description' => 'Overview of Excel interface, ribbons, workbooks, worksheets, and data entry basics.',
                'theory_duration' => 1.0,
                'practical_duration' => 1.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Cell Referencing and Data Formatting',
                'topic_description' => 'Understanding relative, absolute, and mixed references; number formats; conditional formatting.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Data Validation and Drop-down Lists',
                'topic_description' => 'Restricting and validating data inputs; creating dependent lists and error alerts.',
                'theory_duration' => 1.0,
                'practical_duration' => 1.5,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Advanced Formulas and Functions',
                'topic_description' => 'In-depth use of text, date, logical, and statistical functions like IF, SUMIF, COUNTIF, and nested formulas.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Lookup and Reference Functions',
                'topic_description' => 'Using VLOOKUP, HLOOKUP, XLOOKUP, INDEX, and MATCH for data retrieval and dynamic referencing.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Working with Tables and Named Ranges',
                'topic_description' => 'Creating and formatting tables, structured references, and using named ranges in formulas.',
                'theory_duration' => 1.0,
                'practical_duration' => 2.0,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Data Sorting, Filtering and Subtotals',
                'topic_description' => 'Custom sorting, multiple-level filters, advanced filter options, and using subtotals.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Pivot Tables and Pivot Charts',
                'topic_description' => 'Creating pivot tables, grouping data, using slicers, and generating pivot charts for summaries.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'What-If Analysis and Data Tools',
                'topic_description' => 'Goal Seek, Scenario Manager, Data Tables, and consolidation of data across workbooks.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.5,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Charts and Visualization Techniques',
                'topic_description' => 'Creating and customizing various charts, combo charts, and using Sparklines and conditional visuals.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Macros and Automation (VBA Introduction)',
                'topic_description' => 'Recording, editing, and running macros; basic introduction to VBA editor and automation tasks.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Protection, Security and Collaboration',
                'topic_description' => 'Protecting worksheets, sharing workbooks, tracking changes, and password protection.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.0,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Importing and Cleaning Data',
                'topic_description' => 'Using Power Query, Text-to-Columns, Flash Fill, and data cleaning techniques.',
                'theory_duration' => 2.0,
                'practical_duration' => 2.5,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'Dashboards and Reports',
                'topic_description' => 'Creating interactive dashboards using pivot tables, charts, slicers, and form controls.',
                'theory_duration' => 2.0,
                'practical_duration' => 3.0,
                'sequence' => 14,
            ],
            [
                'topic_title' => 'Project: Business Data Analysis in Excel',
                'topic_description' => 'Practical case study involving report generation, analysis, and dashboard presentation.',
                'theory_duration' => 1.0,
                'practical_duration' => 4.0,
                'sequence' => 15,
            ],
        ]);

        $course = Course::create(['course_code' => 'GST', 'course_name' => 'GST']);
        // 📘 Add detailed topics for the course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to GST',
                'topic_description' => 'Overview of Goods and Services Tax system, history, and structure in India.',
                'theory_duration' => 2.00,
                'practical_duration' => 0.00,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'GST Registration',
                'topic_description' => 'Process and requirements for GST registration for businesses and professionals.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Filing GST Returns',
                'topic_description' => 'Step-by-step guide to filing monthly, quarterly, and annual GST returns using GST portal.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Input Tax Credit (ITC)',
                'topic_description' => 'Understanding ITC claims, restrictions, and reconciliation procedures.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'GST Compliance & Audit',
                'topic_description' => 'Compliance checklist, audit procedures, and common errors to avoid in GST.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 5,
            ],
        ]);

        $course = Course::create(['course_code' => 'C01', 'course_name' => 'C Programming']);
        // 📘 Add topic details for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to C Programming',
                'topic_description' => 'Overview of C language history, features, and structure of a C program.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Data Types, Variables, and Operators',
                'topic_description' => 'Understanding data types, constants, variables, and use of arithmetic, logical, and relational operators.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Control Statements',
                'topic_description' => 'Conditional and looping constructs like if-else, switch, for, while, and do-while loops.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Functions and Recursion',
                'topic_description' => 'Creating functions, function prototypes, passing parameters, and recursive calls.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Arrays and Strings',
                'topic_description' => 'Single and multi-dimensional arrays, string handling, and common string functions.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Pointers',
                'topic_description' => 'Pointer basics, pointer arithmetic, and dynamic memory allocation concepts.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Structures and File Handling',
                'topic_description' => 'Defining structures, nested structures, file operations such as reading, writing, and appending files.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 7,
            ],
        ]);

        // 🐍 Create the main course
        $course = Course::create([
            'course_code' => 'P01',
            'course_name' => 'Python Programming',
        ]);

        // 📘 Add topic details for Python Programming
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Python',
                'topic_description' => 'Overview of Python language, its features, installation, and first program execution.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Data Types, Variables, and Operators',
                'topic_description' => 'Understanding Python data types, variables, constants, and different types of operators.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Conditional Statements and Loops',
                'topic_description' => 'Implementing decision-making with if-else, nested if, and loops like for and while.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Functions and Modules',
                'topic_description' => 'Creating reusable functions, understanding scope, and working with Python modules.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Lists, Tuples, and Dictionaries',
                'topic_description' => 'Working with Python’s key data structures for storing and accessing collections of data.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'File Handling',
                'topic_description' => 'Reading from and writing to files, handling file exceptions, and working with CSV files.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Object-Oriented Programming in Python',
                'topic_description' => 'Classes, objects, inheritance, polymorphism, and encapsulation in Python.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Exception Handling and Libraries',
                'topic_description' => 'Understanding try-except blocks and exploring common libraries like math, datetime, and os.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 8,
            ],
        ]);
        // ☕ Create the main course
        $course = Course::create([
            'course_code' => 'J01',
            'course_name' => 'Basic Java Programming',
        ]);

        // 📘 Add topic details for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Java',
                'topic_description' => 'Overview of Java, its features, JDK installation, and structure of a Java program.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Data Types, Variables, and Operators',
                'topic_description' => 'Understanding Java data types, variables, literals, and different types of operators.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Control Statements',
                'topic_description' => 'Decision-making with if, if-else, switch, and looping constructs like for, while, and do-while.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Arrays and Strings',
                'topic_description' => 'Single and multi-dimensional arrays, string handling, and use of String class methods.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Methods and Recursion',
                'topic_description' => 'Creating methods, parameter passing, return values, and understanding recursion.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Object-Oriented Programming Concepts',
                'topic_description' => 'Classes, objects, constructors, method overloading, and encapsulation principles.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Inheritance and Polymorphism',
                'topic_description' => 'Extending classes, using super keyword, overriding methods, and runtime polymorphism.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Exception Handling and File I/O',
                'topic_description' => 'Working with try-catch blocks, custom exceptions, and basic file input/output operations in Java.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 8,
            ],
        ]);
        // ☕ Create the main course
        $course = Course::create([
            'course_code' => 'J02',
            'course_name' => 'Advance Java',
        ]);

        // 📘 Add topic details for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Core Java',
                'topic_description' => 'Overview of Java language, JVM architecture, features, and difference between JDK, JRE, and JVM.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Data Types, Variables, and Operators',
                'topic_description' => 'Understanding primitive and non-primitive data types, variables, constants, and different operators in Java.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Control Flow and Loops',
                'topic_description' => 'Working with if-else, switch, for, while, and do-while loops; using break and continue statements.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Arrays and String Handling',
                'topic_description' => 'Understanding arrays (1D & 2D), String class, StringBuffer, and StringBuilder operations.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Methods and Constructors',
                'topic_description' => 'Defining methods, method overloading, parameter passing, recursion, and different types of constructors.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Object-Oriented Programming Basics',
                'topic_description' => 'Core OOP concepts — classes, objects, encapsulation, and the “this” keyword.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Inheritance in Java',
                'topic_description' => 'Single and multilevel inheritance, use of super keyword, constructor chaining, and method overriding.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Abstract Classes and Methods',
                'topic_description' => 'Understanding abstraction, abstract methods, and real-world examples of abstract classes in Java.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Interfaces and Multiple Inheritance',
                'topic_description' => 'Creating and implementing interfaces, default and static methods in interfaces, and multiple inheritance via interfaces.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Packages and Access Modifiers',
                'topic_description' => 'Organizing code using packages and understanding public, private, protected, and default access levels.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Exception Handling in Java',
                'topic_description' => 'Using try-catch-finally blocks, throw and throws keywords, custom exceptions, and handling multiple exceptions.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.50,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Generics in Java',
                'topic_description' => 'Understanding type safety, generic classes, methods, and collections framework with generics.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Wrapper Classes and Autoboxing',
                'topic_description' => 'Concept of wrapper classes, conversion between primitives and objects, and autoboxing/unboxing.',
                'theory_duration' => 1.00,
                'practical_duration' => 1.00,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'Collection Framework Overview',
                'topic_description' => 'Introduction to List, Set, Map interfaces and common implementations like ArrayList and HashMap.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 14,
            ],
        ]);
        // 💻 Create the main course
        $course = Course::create([
            'course_code' => 'O01',
            'course_name' => 'Office Procedure and Computer Fundamentals',
        ]);

        // 📘 Add detailed topics for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Office Procedure',
                'topic_description' => 'Understanding office setup, official communication, filing system, record keeping, and basic administrative workflow.',
                'theory_duration' => 2.00,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Fundamentals of Computer',
                'topic_description' => 'Basics of computer hardware, software, input-output devices, storage units, and computer generations.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Operating System and Windows 11 Interface',
                'topic_description' => 'Introduction to operating systems, Windows 11 features, desktop customization, file and folder management, and system tools.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'MS Word — Document Creation and Formatting',
                'topic_description' => 'Creating and editing documents, formatting text, using styles, inserting tables, images, headers, and footers.',
                'theory_duration' => 1.50,
                'practical_duration' => 2.00,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'MS Word — Advanced Features',
                'topic_description' => 'Mail merge, templates, track changes, comments, table of contents, and printing options.',
                'theory_duration' => 1.00,
                'practical_duration' => 1.50,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'MS Excel — Basics and Data Entry',
                'topic_description' => 'Introduction to spreadsheets, data entry, cell referencing, formulas, and basic formatting.',
                'theory_duration' => 1.50,
                'practical_duration' => 2.00,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'MS Excel — Formulas, Charts, and Data Analysis',
                'topic_description' => 'Using functions, creating charts, conditional formatting, and basic data analysis tools like sorting and filtering.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'MS PowerPoint — Presentation Basics',
                'topic_description' => 'Creating slides, themes, text and image insertion, transitions, and animation effects.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'MS PowerPoint — Advanced Presentation Design',
                'topic_description' => 'Slide master, custom animations, multimedia integration, and preparing for live presentations.',
                'theory_duration' => 1.00,
                'practical_duration' => 1.50,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Basic Internet and Email Usage',
                'topic_description' => 'Using web browsers, searching information, downloading files, creating and managing email accounts, and internet safety.',
                'theory_duration' => 1.00,
                'practical_duration' => 1.00,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Introduction to HTML',
                'topic_description' => 'Basics of web development, understanding HTML structure, tags, attributes, and creating a simple webpage.',
                'theory_duration' => 1.50,
                'practical_duration' => 2.00,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'HTML Formatting and Links',
                'topic_description' => 'Formatting text, inserting images, hyperlinks, tables, and basic page layout design.',
                'theory_duration' => 1.50,
                'practical_duration' => 2.00,
                'sequence' => 12,
            ],
        ]);

        // 🧠 Create the main course
        $course = Course::create([
            'course_code' => 'DS01',
            'course_name' => 'Data Structure and Algorithm',
        ]);

        // 📘 Add detailed topics for this course
        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Data Structures and Algorithms',
                'topic_description' => 'Understanding what data structures and algorithms are, their importance, and types of data structures.',
                'theory_duration' => 1.50,
                'practical_duration' => 0.50,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Algorithm Analysis and Big O Notation',
                'topic_description' => 'Time and space complexity, Big O, Big Theta, and Big Omega notations, and analyzing algorithm efficiency.',
                'theory_duration' => 2.00,
                'practical_duration' => 1.00,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'Arrays and Strings',
                'topic_description' => 'Introduction to arrays, operations like insertion, deletion, traversal, and string manipulation.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Linked Lists',
                'topic_description' => 'Singly, doubly, and circular linked lists with operations such as insertion, deletion, and traversal.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Stacks',
                'topic_description' => 'Concept of LIFO, stack operations using arrays and linked lists, and applications such as expression evaluation.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'Queues',
                'topic_description' => 'FIFO principle, types of queues (simple, circular, priority, and deque), and real-life applications.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'Recursion and Divide & Conquer Algorithms',
                'topic_description' => 'Concept of recursion, stack frame management, and examples like factorial, Fibonacci, and binary search.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'Searching and Sorting Algorithms',
                'topic_description' => 'Linear and binary search; sorting algorithms such as bubble sort, selection sort, insertion sort, merge sort, and quick sort.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'Trees and Binary Search Trees',
                'topic_description' => 'Tree terminology, binary trees, traversals (inorder, preorder, postorder), and binary search tree operations.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Heaps and Priority Queues',
                'topic_description' => 'Understanding heap structure, heapify process, insertion and deletion in heaps, and heap sort.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'Graphs and Graph Traversals',
                'topic_description' => 'Graph representation (adjacency matrix/list), BFS, DFS, and shortest path algorithms (Dijkstra, Floyd-Warshall).',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Hashing and Hash Tables',
                'topic_description' => 'Concept of hash functions, collision resolution techniques (chaining, open addressing), and load factor.',
                'theory_duration' => 1.50,
                'practical_duration' => 1.50,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Greedy, Dynamic Programming, and Backtracking',
                'topic_description' => 'Introduction to problem-solving techniques — greedy algorithms, dynamic programming, and backtracking concepts.',
                'theory_duration' => 2.00,
                'practical_duration' => 2.00,
                'sequence' => 13,
            ],
        ]);
        $course = Course::create([
            'course_code' => 'C06',
            'course_name' => 'Full Stack Development'
        ]);

        $course->details()->createMany([
            [
                'topic_title' => 'Introduction to Full Stack Development',
                'topic_description' => 'Overview of front-end, back-end, and database layers. Understanding client-server architecture and developer roles.',
                'theory_duration' => 1.5,
                'practical_duration' => 0.5,
                'sequence' => 1,
            ],
            [
                'topic_title' => 'Basic HTML',
                'topic_description' => 'Learning HTML structure, elements, tags, and document formatting. Creating static web pages.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 2,
            ],
            [
                'topic_title' => 'CSS Fundamentals',
                'topic_description' => 'Styling web pages using CSS, selectors, colors, layouts, and responsive design.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 3,
            ],
            [
                'topic_title' => 'Bootstrap Framework',
                'topic_description' => 'Building responsive websites quickly using Bootstrap classes and components.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 4,
            ],
            [
                'topic_title' => 'Tailwind CSS',
                'topic_description' => 'Learning utility-first CSS with Tailwind for rapid UI development.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 5,
            ],
            [
                'topic_title' => 'JavaScript Basics',
                'topic_description' => 'Variables, functions, events, DOM manipulation, and loops in JavaScript.',
                'theory_duration' => 3,
                'practical_duration' => 4,
                'sequence' => 6,
            ],
            [
                'topic_title' => 'jQuery Essentials',
                'topic_description' => 'Simplifying JavaScript with jQuery for DOM traversal, effects, and AJAX.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 7,
            ],
            [
                'topic_title' => 'PHP Programming',
                'topic_description' => 'Server-side scripting using PHP. Form handling, sessions, and file operations.',
                'theory_duration' => 3,
                'practical_duration' => 5,
                'sequence' => 8,
            ],
            [
                'topic_title' => 'MySQL Database',
                'topic_description' => 'Database design, CRUD operations, joins, and relationships using MySQL.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 9,
            ],
            [
                'topic_title' => 'Laravel Framework',
                'topic_description' => 'MVC structure, routing, controllers, models, migrations, and authentication using Laravel.',
                'theory_duration' => 3,
                'practical_duration' => 5,
                'sequence' => 10,
            ],
            [
                'topic_title' => 'API Development with Laravel',
                'topic_description' => 'Creating and consuming RESTful APIs using Laravel.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 11,
            ],
            [
                'topic_title' => 'Node.js Fundamentals',
                'topic_description' => 'Introduction to Node.js environment, npm packages, and backend scripting.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 12,
            ],
            [
                'topic_title' => 'Angular Basics',
                'topic_description' => 'Learning Angular components, directives, and data binding concepts.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 13,
            ],
            [
                'topic_title' => 'React.js Fundamentals',
                'topic_description' => 'Component-based architecture, state management, and hooks in React.',
                'theory_duration' => 2,
                'practical_duration' => 3,
                'sequence' => 14,
            ],
            [
                'topic_title' => 'Version Control with Git & GitHub',
                'topic_description' => 'Working with Git commands, repositories, branches, and collaboration on GitHub.',
                'theory_duration' => 1.5,
                'practical_duration' => 2.5,
                'sequence' => 15,
            ],
            [
                'topic_title' => 'Live Project Development',
                'topic_description' => 'Building and deploying a full-stack project integrating all learned technologies.',
                'theory_duration' => 2,
                'practical_duration' => 8,
                'sequence' => 16,
            ],
        ]);
        CourseStatus::insert([
            ['course_status_name' => 'Ongoing'],
            ['course_status_name' => 'Completed'],
            ['course_status_name' => 'Incomplete'],
        ]);

        // ******************************** fake students ********************************
        DB::table('students')->insert([
            [
                'registration_number' => 'REG2025001',
                'student_name' => 'Anirban Dey',
                'nickname' => 'anir',
                'email' => 'anirban.dey@example.com',
                'dob' => '2003-05-10',
                'blood_group' => 'B+',
                'father_name' => 'Sanjay Dey',
                'mother_name' => 'Mita Dey',
                'guardian_name' => null,
                'guardian_relation' => null,
                'guardian_phone' => null,
                'phone1' => '9876543210',
                'phone2' => null,
                'whatsapp' => '9876543210',
                'address' => 'Barrackpore, West Bengal',
                'district_id' => 1,
                'city' => 'Barrackpore',
                'pin' => '700120',
                'gender_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'registration_number' => 'REG2025002',
                'student_name' => 'Priya Saha',
                'nickname' => 'priya',
                'email' => 'priya.saha@example.com',
                'dob' => '2004-02-15',
                'blood_group' => 'A+',
                'father_name' => 'Rakesh Saha',
                'mother_name' => 'Moumita Saha',
                'guardian_name' => null,
                'guardian_relation' => null,
                'guardian_phone' => null,
                'phone1' => '9876501234',
                'phone2' => null,
                'whatsapp' => '9876501234',
                'address' => 'Kolkata, West Bengal',
                'district_id' => 2,
                'city' => 'Kolkata',
                'pin' => '700001',
                'gender_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'registration_number' => 'REG2025003',
                'student_name' => 'Rohit Sen',
                'nickname' => 'rohit',
                'email' => 'rohit.sen@example.com',
                'dob' => '2002-11-25',
                'blood_group' => 'O+',
                'father_name' => 'Dipankar Sen',
                'mother_name' => 'Kalyani Sen',
                'guardian_name' => null,
                'guardian_relation' => null,
                'guardian_phone' => null,
                'phone1' => '9876009876',
                'phone2' => null,
                'whatsapp' => '9876009876',
                'address' => 'Howrah, West Bengal',
                'district_id' => 3,
                'city' => 'Howrah',
                'pin' => '711101',
                'gender_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'registration_number' => 'REG2025004',
                'student_name' => 'Sneha Chatterjee',
                'nickname' => 'sneha',
                'email' => 'sneha.chatterjee@example.com',
                'dob' => '2005-07-12',
                'blood_group' => 'AB+',
                'father_name' => 'Suman Chatterjee',
                'mother_name' => 'Rita Chatterjee',
                'guardian_name' => null,
                'guardian_relation' => null,
                'guardian_phone' => null,
                'phone1' => '9876123456',
                'phone2' => null,
                'whatsapp' => '9876123456',
                'address' => 'Dumdum, West Bengal',
                'district_id' => 4,
                'city' => 'Dumdum',
                'pin' => '700028',
                'gender_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'registration_number' => 'REG2025005',
                'student_name' => 'Arjun Ghosh',
                'nickname' => 'arjun',
                'email' => 'arjun.ghosh@example.com',
                'dob' => '2003-01-08',
                'blood_group' => 'O-',
                'father_name' => 'Amit Ghosh',
                'mother_name' => 'Rina Ghosh',
                'guardian_name' => null,
                'guardian_relation' => null,
                'guardian_phone' => null,
                'phone1' => '9876554321',
                'phone2' => null,
                'whatsapp' => '9876554321',
                'address' => 'Barasat, West Bengal',
                'district_id' => 5,
                'city' => 'Barasat',
                'pin' => '700124',
                'gender_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        //*******************************************************************************
    }
}
