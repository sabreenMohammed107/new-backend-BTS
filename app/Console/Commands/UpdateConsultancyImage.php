<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\StaticPage;

class UpdateConsultancyImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consultancy:update-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update consultancy image from 1743868445_Consultancy.png to Gemini_Generated_Image_ikfry6ikfry6ikfr.png';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $consultancy = StaticPage::find(9);
        
        if (!$consultancy) {
            $this->error('Consultancy static page (id=9) not found!');
            return 1;
        }

        $oldImage = 'uploads/consultancy/1743868445_Consultancy.png';
        $newImage = 'uploads/consultancy/Gemini_Generated_Image_ikfry6ikfry6ikfr.png';

        // Check if the current value matches the old image
        if ($consultancy->details2 === $oldImage) {
            $consultancy->details2 = $newImage;
            $consultancy->save();
            $this->info('Successfully updated consultancy image from ' . $oldImage . ' to ' . $newImage);
            return 0;
        } elseif ($consultancy->details2 === $newImage) {
            $this->info('Image is already set to the new image: ' . $newImage);
            return 0;
        } else {
            $this->warn('Current image path is: ' . $consultancy->details2);
            $this->warn('Expected old image path: ' . $oldImage);
            $this->warn('If you want to update it anyway, please update manually or modify this command.');
            return 1;
        }
    }
}
