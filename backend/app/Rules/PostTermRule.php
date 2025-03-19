<?php

namespace App\Rules;

use App\Models\Term;
use Illuminate\Contracts\Validation\Rule;

class PostTermRule implements Rule
{
    private Term $term;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        public string $taxonomy
    ) {
        $this->term = app(Term::class);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $termIds
     * @return bool
     */
    public function passes($attribute, $termIds)
    {
        if(count($termIds) === 0) {
            return true;
        }

        return !!$this->term->whereIn("id", $termIds)->whereRelation("taxonomy", "name", $this->taxonomy)->first();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return str_replace('_', ' ', $this->taxonomy) . ' is invalid.';
    }
}
