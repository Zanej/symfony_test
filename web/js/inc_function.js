$(document).on("submit", "#login_form", function(e){
    
    if($("#login_form input[name='email']").val().trim() !== "" && $("#login_form input[name='password']").val().trim() !== ""){
        
        $.ajax({
            
            url:"/articms/login/",
            dataType:"json",
            type:"POST",
            data:{
                
                email:$("#login_form input[name='email']").val(),
                password:$("#login_form input[name='password']").val()
            },
            success:function(data){
                
                if(data.success){
                    window.location.href = "/articms/admin/";
                }else{
                    
                }
                //console.log(data);
            }
            
        });
        
    }
    
    return false;
});

$(document).on("click", ".ajax_call", function(e){
    e.preventDefault();
    var href = $(this).prop("href");
    var elem = $(this);
    
    console.debug(elem);
    $.ajax({
        url:href,
        dataType:"json",
        success:function(data){
            
            if(data.success){
                
                if(data.stato == 1){
                    
                    elem.removeClass("btn-success");
                    elem.addClass("btn-warning");                    
                    elem.find("i").removeClass("fa-unlock");
                    elem.find("i").addClass("fa-lock");
                    
                }else{
                    
                    elem.addClass("btn-success");
                    elem.removeClass("btn-warning");
                    elem.find("i").addClass("fa-unlock");
                    elem.find("i").removeClass("fa-lock");                    
                }
                
                elem.prop("href",data.href);
            }
        },
        error:function(data){
            
        }
    });
    
    return false;
});

$(document).ready(function() {
    
    $('input[type="date"]').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_4"
    }, function(start, end, label) {
        
        $(this.element).val(start.format("YYYY-MM-DD"));
    });
    
    $('input[type="radio"], input[type="checkbox"]').iCheck();
});

$(document).ready(function() {
    
    $('textarea.plugged').each(function(){
        
        CKEDITOR.replace($(this).prop("id"),{
            toolbar:[
                { name: "document", items: ["Source"] },
                { name : "basicstyles", items: [ "Bold", "Italic", "Strike", "RemoveFormat"] },
                { name: "links", items: ["Link", "Unlink", "Anchor"] },                        
                { name: "clipboard", items: ["Cut", "Copy", "Paste", "PasteText", "PasteFromWord", "Undo", "Redo"] },                        
                
                
            ],
            enterMode: CKEDITOR.ENTER_BR
        });
    });
});

//bootstrap-wysiwyg

//Select2    
$(document).ready(function() {
    $("select:not([multiple])").select2({
        placeholder: "Seleziona un elemento",
        allowClear: true
    });
    
    //        $(".select2_group").select2({});
    
    $("select[multiple]").select2({
//        maximumSelectionLength: 4,
//        placeholder: "With Max Selection limit 4",
        allowClear: true
    });
});    

//    <!-- jQuery Tags Input -->    
function onAddTag(tag) {
    alert("Added a tag: " + tag);
}

function onRemoveTag(tag) {
    alert("Removed a tag: " + tag);
}

function onChangeTag(input, tag) {
    alert("Changed a tag: " + tag);
}

$(document).ready(function() {
    $('#tags_1').tagsInput({
        width: 'auto'
    });
});
//    <!-- /jQuery Tags Input -->

//    <!-- Parsley -->
$(document).ready(function() {
    
    $.listen('parsley:field:validate', function() {
        validateFront();
    });
    $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
    });
    var validateFront = function() {
        
        if (true === $('#edit_form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
        } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
        }
    };
});

$(document).ready(function() {
    $.listen('parsley:field:validate', function() {
        validateFront();
    });
    $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
    });
    
    var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
        } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
        }
    };
    
});
try {
    hljs.initHighlightingOnLoad();
} catch (err) {}    
//    <!-- /Parsley -->

//    <!-- Autosize -->
//    <script>
$(document).ready(function() {
    autosize($('textarea'));
});
//    </script>
//    <!-- /Autosize -->

//    <!-- jQuery autocomplete -->
//    <script>
//      $(document).ready(function() {
//        var countries = { AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };
//
//        var countriesArray = $.map(countries, function(value, key) {
//          return {
//            value: value,
//            data: key
//          };
//        });
//
//        // initialize autocomplete with custom appendTo
//        $('#autocomplete-custom-append').autocomplete({
//          lookup: countriesArray
//        });
//      });
//    </script>
//    <!-- /jQuery autocomplete -->

//    <!-- Starrr -->    
$(document).ready(function() {
    $(".stars").starrr();
    
    $('.stars-existing').starrr({
        rating: 4
    });
    
    $('.stars').on('starrr:change', function (e, value) {
        $('.stars-count').html(value);
    });
    
    $('.stars-existing').on('starrr:change', function (e, value) {
        $('.stars-count-existing').html(value);
    });
});