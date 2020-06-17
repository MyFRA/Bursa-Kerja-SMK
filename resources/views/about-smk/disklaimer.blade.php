@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-address-card-o mr-3"></i>{{__('Disclaimer')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{__('Disclaimer')}}</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="h5"><i class="fa fa-arrow-left fa-0x mr-2"></i>Kembali</a>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body px-5 pt-2 pb-5">
                        <h1>Disclaimer for SMK Negeri 1 Bojongsari</h1>

                        <p>If you require any more information or have any questions about our site's disclaimer, please feel free to contact us by email at smknegeri1bojongsari@gmail.com</p>

                        <h2>Disclaimers for SMK Bisa Kerja | SMK Negeri 1 Bojongsari</h2>

                        <p>All the information on this website - smknegeri1bojongsari.sch.id - is published in good faith and for general information purpose only. SMK Bisa Kerja | SMK Negeri 1 Bojongsari does not make any warranties about the completeness, reliability and accuracy of this information. Any action you take upon the information you find on this website (SMK Bisa Kerja | SMK Negeri 1 Bojongsari), is strictly at your own risk. SMK Bisa Kerja | SMK Negeri 1 Bojongsari will not be liable for any losses and/or damages in connection with the use of our website. Our Disclaimer was generated with the help of the <a href="https://www.disclaimergenerator.net/">Disclaimer Generator</a> and the <a href="https://www.disclaimer-generator.com">Disclaimer Generator</a>.</p>

                        <p>From our website, you can visit other websites by following hyperlinks to such external sites. While we strive to provide only quality links to useful and ethical websites, we have no control over the content and nature of these sites. These links to other websites do not imply a recommendation for all the content found on these sites. Site owners and content may change without notice and may occur before we have the opportunity to remove a link which may have gone 'bad'.</p>

                        <p>Please be also aware that when you leave our website, other sites may have different privacy policies and terms which are beyond our control. Please be sure to check the Privacy Policies of these sites as well as their "Terms of Service" before engaging in any business or uploading any information.</p>

                        <h2>Consent</h2>

                        <p>By using our website, you hereby consent to our disclaimer and agree to its terms.</p>

                        <h2>Update</h2>

                        <p>Should we update, amend or make any changes to this document, those changes will be prominently posted here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
