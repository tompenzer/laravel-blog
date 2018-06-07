@if (isset($messages) && isset($messages['notification']))
    @component('components.alerts.dismissible', [
        'type' => (isset($messages['notification']['status'])
            ? $messages['notification']['status']
            : 'success')
    ])
      {{ (isset($messages['notification']['message'])
          ? $messages['notification']['message']
          : '') }}
    @endcomponent
@endif
