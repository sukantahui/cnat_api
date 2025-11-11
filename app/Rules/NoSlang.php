<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoSlang implements ValidationRule
{
    /**
     * List of forbidden slang or abusive words.
     */
    protected array $badWords = [
        // Common vulgarities
        'fuck',
        'shit',
        'bitch',
        'asshole',
        'bastard',
        'dick',
        'cunt',
        'slut',
        'fag',
        'moron',
        'stupid',
        'idiot',
        'retard',
        'nigga',
        'whore',
        'jerk',
        'piss',
        'bloody',
        'suck',
        'dumb',
        'cock',
        'pussy',
        'balls',
        'boobs',
        'tits',
        'arse',
        'bollocks',
        'bugger',
        'crap',
        'damn',
        'prick',

        // Internet slang / short forms
        'wtf',
        'lmfao',
        'lmao',
        'omfg',
        'stfu',
        'fml',
        'roflmao',
        'rofl',
        'af',
        'tf',
        'mf',
        'bastards',
        'fucker',
        'motherfucker',
        'fucked',
        'fucking',
        'fucktard',
        'shithead',
        'shitface',
        'shitbag',
        'dickhead',
        'jackass',
        'douche',
        'douchebag',
        'hoe',
        'thot',
        'trash',
        'loser',

        // Racial / hateful slurs
        'chink',
        'spic',
        'kike',
        'cracker',
        'coon',
        'wetback',
        'gook',
        'tranny',
        'dyke',
        'faggot',
        'queer',
        'retarded',
        'shemale',
        'negro',

        // Sexual / explicit
        'sex',
        'sexual',
        'porn',
        'porno',
        'pornographic',
        'nude',
        'naked',
        'jerkoff',
        'masturbate',
        'masturbation',
        'orgasm',
        'horny',
        'blowjob',
        'handjob',
        'suckmy',
        'deepthroat',
        'doggystyle',
        'cum',
        'ejaculate',
        'vagina',
        'penis',
        'anal',
        'anus',
        'clit',
        'dildo',
        'semen',
        'sperm',
        'boob',
        'breast',
        'milf',

        // Insults / aggression
        'die',
        'kill',
        'hate',
        'ugly',
        'loser',
        'worthless',
        'garbage',
        'trash',
        'idiotic',
        'disgusting',
        'stupidass',
        'lazy',
        'fool',
        'madarchod',
        'bhenchod',
        'chutiya',
        'gaand',
        'randi',
        'suar',

        // Variations and leetspeak
        'f*ck',
        'f@ck',
        'sh1t',
        'b!tch',
        'a$$',
        'f.u.c.k',
        's.h.i.t',
        'b!tch',
        'p0rn',
        's3x',
        'idi0t',
        'a$$hole',
        'd1ck',
        'f@ggot',
        'sl@t'
    ];


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($value)) {
            return; // Only check strings
        }

        $lowerValue = strtolower($value);

        foreach ($this->badWords as $word) {
            if (str_contains($lowerValue, $word)) {
                $fail("The {$attribute} contains inappropriate language. Please rephrase it.");
                return;
            }
        }
    }
}
