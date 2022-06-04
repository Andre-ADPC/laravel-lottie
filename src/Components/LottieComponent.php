<?php

namespace ADPC\Lottie\Components;

use Illuminate\View\Component;
use ADPC\Lottie\Facades\Lottie;

class LottieComponent extends Component
{
    public function render()
    {
        return function (array $data) {
            return Lottie::render($data);
        };
    }
}
