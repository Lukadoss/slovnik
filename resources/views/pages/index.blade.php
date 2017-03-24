@include('default.header')
<div class="mdl-layout__content">
    <main>
        <div class="mdl-grid">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                buttonek
            </button>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <link href="css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".ayy").select2({
                        placeholder: 'Select an option',
                        theme: 'default',
                        minimumInputLength: 2
                    });
                });
            </script>

            <select class="ayy">
                @foreach($districts as $district)
                    <option><?php echo $district->municipality.", ".$district->region;?></option>
                @endforeach
            </select>


        </div>
    </main>
</div>
@include('default.footer')
