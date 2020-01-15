<?php

namespace App\Console\Commands;

use App\Wishlist;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class ExportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export-data:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export Wishlists with products number';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dati = DB::table('wishlist')
            ->join('wishlist_products','wishlist_products.id_wishlist','=','wishlist.id')
            ->select('wishlist.id_user as user','wishlist.name as title',DB::raw("count(wishlist_products.id) as number_of_items"))
            ->groupBy('wishlist.id')
            ->get();
        $filename = "wishlist.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('User', 'Title', 'Number of items'));

        foreach($dati as $row) {
            fputcsv($handle, array($row->user, $row->title, $row->number_of_items));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return response()->download($filename, 'wishlist.csv', $headers);
        $this->info('Ok!');
    }
}
