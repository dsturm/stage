<article @php post_class() @endphp>

  <header>
    <h1>{{ $title }}</h1>
  </header>

  <div class="content">

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

    <footer>
      <h4>Interessiert? Dann senden Sie Ihren Lebenslauf an:</h4>
      <p>Katja Manhillen<br>
        IBB Team Vermittlung<br>vermittlung@ibb.com</p>
    </footer>
  </div>

</article>
