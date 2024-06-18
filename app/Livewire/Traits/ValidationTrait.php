<?php
namespace App\Livewire\Traits;

    trait ValidationTrait{
        public function getValidationAttributes(){
            $atts = $this->getRules();
            $res = [];
            foreach($atts as $k=>$v){
                $res[$k] = __(''.str_replace('form.','',$k));
            }
            return $res;
        }
    }