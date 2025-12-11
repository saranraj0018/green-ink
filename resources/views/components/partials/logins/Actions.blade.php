<div x-data="{ step: 'signup' }">

    <div x-show="step === 'signup'">
        @include('components.partials.logins.signup')
    </div>

    <div x-show="step === 'verify'">
        @include('components.partials.logins.VerifyOTP')
    </div>
    <div x-show="step === 'createAccount'">
        @include('components.partials.logins.CreateAccount')
    </div>
    <div x-show="step === 'signinInstead'">
        @include('components.partials.logins.signup')
    </div>

</div>
