<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = ['excerpt'];

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function getImageAttribute($image){
        $image = str_replace("public","storage",$image);;
        $image = '/'.$image;
        return $image;
    }

    public function prices(){
        return $this->hasMany('App\Variaton', 'product_id');
    }
    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        if (strlen($this->description) < 80) {

            return $this->description;

        }
       
        $new = wordwrap($this->description, 100);
        $new = explode("\n", $new);
    
        $new = $new[0] . '...';
    
        return $new;
    }

    public function generateSlug($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
