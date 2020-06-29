<?php
/**
 * Created by PhpStorm.
 * User: DumplingOS
 * Date: 6/27/2020
 * Time: 11:57 AM
 */

namespace App\Traits;


use App\Models\Template;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;

trait useTemplates
{
    use HasRelationships;

    public function templates()
    {
        return $this->morphToMany(Template::class, 'component', 'pivot_templates', 'component_id', 'template_id');
    }
}
