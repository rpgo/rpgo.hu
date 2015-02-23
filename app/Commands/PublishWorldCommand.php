<?php namespace Rpgo\Commands;

use Illuminate\Contracts\Queue\ShouldBeQueued;

use Illuminate\Contracts\Bus\SelfHandling;
use Intervention\Image\ImageManager;
use Rpgo\Models\World;
use Spatie\Browsershot\Browsershot;

class PublishWorldCommand extends Command implements SelfHandling, ShouldBeQueued {
    /**
     * @var World
     */
    private $world;

    /**
     * Create a new command instance.
     * @param World $world
     */
	public function __construct(World $world)
	{
        $this->world = $world;
    }

    /**
     * Execute the command.
     * @param ImageManager $img
     * @param Browsershot $shot
     * @throws \Exception
     */
	public function handle(ImageManager $img, Browsershot $shot)
	{
        $this->world->publish()->save();

        $shot->setUrl('http://'. $this->world->slug . '.' . env('APP_DOMAIN'))
            ->setWidth(1024)
            ->setHeight(786)
            ->save(storage_path('app/previews/tmp.jpg'));

        $img = $img->make(storage_path('app/previews/tmp.jpg'));

        $img->resize(130,130);

        $img->save(public_path('images/previews/' . $this->world->slug . '.jpg'));
	}

}
