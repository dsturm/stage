<div class="grid grid-flow-col-dense">
  <div styleprop="responsibilities">
    <h3>{{ __('Your tasks', 'stage') }}</h3>

    @field('responsibilities')
  </div>

  <div styleprop="qualifications">
    <h3>{{ __('Your profile', 'stage') }}</h3>

    @field('qualifications')
  </div>

  <div styleprop="incentives">
    <h3>{{ __('What we offer you', 'stage') }}</h3>

    @field('incentives')
  </div>

  <div styleprop="about">
    <h3>{{ __('My employer', 'stage') }}</h3>

    @field('about')
  </div>
</div>
