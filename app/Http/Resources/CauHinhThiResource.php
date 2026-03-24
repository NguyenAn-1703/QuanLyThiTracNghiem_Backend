<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CauHinhThiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'cauHinhId' => $this->cauHinhId,
            'hasMonitoring' => $this->hasMonitoring,
            'allowCopy' => $this->allowCopy,
            'allowPrint' => $this->allowPrint,
            'isEnableResume' => $this->isEnableResume,
            'shuffleQuestions' => $this->shuffleQuestions,
            'shuffleAnswers' => $this->shuffleAnswers,
            'showScore' => $this->showScore,
            'showDetailResults' => $this->showDetailResults,
            'isLimitSwitchTab' => $this->isLimitSwitchTab,
            'tabSwitchLimit' => $this->tabSwitchLimit,
            'messageOnWarning' => $this->messageOnWarning,
            'deThiId' => $this->deThiId,
            'deThi' => new DeThiResource($this->whenLoaded('deThi')),
        ];
    }
}
