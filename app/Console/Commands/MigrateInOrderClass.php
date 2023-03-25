<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrderClass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:in-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $migrations = [
            '2014_10_12_000000_create_users_table',
            '2013_12_18_083601_create_countries_table',
            '2022_12_25_123327_create_departments_table',
            '2014_10_12_100000_create_password_resets_table',
            '2019_08_19_000000_create_failed_jobs_table',
            '2019_12_14_000001_create_personal_access_tokens_table',
            '2022_12_10_114452_create_permission_tables',
            '2022_12_25_123329_create_sections_table',
            '2022_12_25_123334_create_semesters_table',
            '2022_12_25_123328_create_courses_table',
            '2022_12_25_123331_create_attendances_table',
            '2022_12_25_123332_create_students_table',
            '2022_12_25_123333_create_grades_table',
            '2022_12_25_123335_create_transactions_table',
            '2022_12_25_123337_create_student_course_records_table',
            '2022_12_25_123338_create_student_records_table',
            '2022_12_25_123336_create_academic_years_table',
            '2022_12_25_123339_create_invoices_table',
            '2022_12_25_123340_create_receipts_table',
            '2022_12_25_123341_create_qualifications_table',
      ];

      foreach ($migrations as $migration) {
        $this->call('migrate:refresh', [
          '--path' => "database/migrations/{$migration}.php"
        ]);
      }
    }
}
