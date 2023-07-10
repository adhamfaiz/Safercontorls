<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           
           'قائمه الفنادق',
           'قائمه الغرف',
           'اضافه غرف',
           'تعديل غرف',
           'حذف غرف',
           'اضافه فنادق',
           'حذف فنادق',
           'تعديل فنادق',
           'قائمه السيارات',
           'قائمه شركه السيارات',
           'اضافه سيارات',
           'اضافه شركه سيارات',
           'تعديل شركه سيارات',
           'حذف شركه سيارات',
           'تعديل سياره',
           'حذف سياره',
           'الحجوزات',
           'اضافه مستخدم',
           'حذف مستخدم',
           'تعديل مستخدم',
           'عرض الصلاحيات',
           'اضافه صلاحيه',
           'الاماكن السياحيه',
           'الاماكن الائريه',
           'الاماكن الرئجه',
           'تعديل صلاحيه',
           'حذف صلاحيه',
           ' الدفع',

          
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}