<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ElFormulaire;
class ELFormulaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today=today();
        
        
        ELFormulaire::create([
            'title' => 'مطلب قرض شخصي',
            'description' => 'مطلب قرض شخصي لمجابهة مصاريف طارئة و استثنائية',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'EL_PRETPERSO'
        ]);

        ELFormulaire::create([
            'title' => 'مطلب قرض تكميلي للسكن',
            'description' => 'مطلب قرض تكميلي للسكن',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'logementsup'
        ]);

        ELFormulaire::create([
            'title' => 'مطلب للحصول على المنحة المدرسية',
            'description' => 'مطلب للحصول على المنحة المدرسية',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'subscolaire'
        ]);

        ELFormulaire::create([
            'title' => 'مطلب للحصول على منحة عيد الفطر',
            'description' => 'مطلب للحصول على منحة عيد الفطر',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'bourseeid'
        ]);

        ELFormulaire::create([
            'title' => 'مطلب للحصول على منحة يوم العلم',
            'description' => 'مطلب للحصول على منحة يوم العلم',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'boursjs'
        ]);

        ELFormulaire::create([
            'title' => 'مطلب منحة على اثر الوفاة',
            'description' => 'مطلب منحة على اثر الوفاة',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'demandedece'
        ]);

        ELFormulaire::create([
            'title' => 'مطلب منحة مخيم صيفي',
            'description' => 'مطلب منحة مخيم صيفي',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'bourscamp'
        ]);
        
        ELFormulaire::create([
            'title' => 'مطلب منحة المولود الجديد',
            'description' => 'مطلب منحة المولود الجديد',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'boursnvne'
        ]);

        ELFormulaire::create([
            'title' => 'مطلب إسترجاع مصاريف الترفيه',
            'description' => 'مطلب منحة بعنوان إسترجاع مصاريف الترفيه',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'boursdevr'
        ]);


        ELFormulaire::create([
            'title' => 'مطلب تبرع',
            'description' => 'مطلب تبرع',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'demandedon'
        ]);

        // ELFormulaire::create([
        //     'title' => 'NOTICE OF ASSIGNEMENT ABROAD',
        //     'description' => 'NOTICE OF ASSIGNEMENT ABROAD',
        //     'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
        //     'created_at'=>$today->format("Y-m-d H:i:s"),
        //     'updated_at'=>$today->format("Y-m-d H:i:s"),
        //     'href'=>'aviscession'
        // ]);

        ELFormulaire::create([
            'title' => 'مطلب قرض لشراء سيارة',
            'description' => 'مطلب قرض لشراء سيارة',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'demandevoiture'
        ]);

        ELFormulaire::create([
            'title' => 'مطلب قرض عند مرض ',
            'description' => 'مطلب قرض عند مرض أو لمداواة أسنان أو لإقتناء نظرات طبية أو لإقتناء عدسات لتصويب النظر',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'demandemaladie'
        ]);
        
        ELFormulaire::create([
            'title' => 'مطلب قرض لزواج أو لختان الابناء',
            'description' => 'مطلب قرض لزواج أو لختان الابناء',
            'role'=>'a:1:{i:0;s:10:"ROLE_USERS";}',
            'created_at'=>$today->format("Y-m-d H:i:s"),
            'updated_at'=>$today->format("Y-m-d H:i:s"),
            'href'=>'demandefete'
        ]);
    }
}
