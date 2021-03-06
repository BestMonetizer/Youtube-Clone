<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
	protected $table = 'channels';

	protected $fillable = ['user_id', 'youtube_channel_id', 'name', 'info'];

	public static function is_exists_with_auth($user, $youtube_id) {
		return (bool)Channel::where('user_id', $user->id)->where('youtube_channel_id', $youtube_id)->count();
	}

	public static function format($channels) {

		foreach($channels as &$channel) {
			$channel->info = json_decode($channel->info);
		}

		return $channels;
	}
}
