@extends('layouts.main')

@section('main-section')
<style>

.link{
    
    font-size:15px;
    font-family:inherit;
    text-decoration:none;
    color:black;
}
.links{
    padding:10px;
}

.collapsible {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.collapsible:after {
  content: '\02795';
  font-size: 13px;
  color: white;
  float: right;
  margin-left: 5px;
}

.active, .collapsible:hover {
  background-color: #ccc;
}

.content {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

.active:after {
  content: "\2796";
}

</style>
<!--<script src='https://kit.fontawesome.com/a076d05399.js'></script>-->
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Mandatory Disclosure</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="/">Home</a>
                            </li>
                            <li>Mandatory Disclosure</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Event Area Start-->
<div class="event-area section-padding bg-white" style="padding-top: 50px;padding-bottom: 20px;">
    <div class="container">
        <!--<div class="row">-->
        <!--    <div class="col-md-12">-->
        <!--        <div class="section-title-wrapper">-->
        <!--            <div class="section-title" style="padding-bottom: 5px;">-->
        <!--                <h3>Mandatory Disclosure</h3>-->
        <!--                <p></p>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->



        <div style="width:80%; margin:auto;" class="mb-3">
            <button type="button" class="collapsible">Mandatory Disclosure</button>
            
            <div class="content">
                
                
            </div>
        
            
        </div>
        <div style="width:80%; margin:auto;" class="mb-3">
            <button type="button" class="collapsible">AICTE Approval Letters</button>
            <div class="content">
                <div class="links">
                    <li>
                    <a class="link" href="assets/pdf/EOA Report 2024-2025.PDF" target="_blank">GMCA AICTE EOA Report 2024-25</a> & <a class="link" href="assets/pdf/Three Year Approval Letter 2024-25.PDF" target="_blank">GMCA AICTE Three Year Approval Letter 2024-25</a>
                    </li>
                </div>
                <div class="links">
                    <li>
                    <a class="link" href="assets/pdf/GMCA AICTE EOA-Report-2023-24.PDF" target="_blank">GMCA AICTE EOA Report 2023-24</a>
                    </li>
                </div>
                <div class="links">
                    <li>
                        
                    <a class="link" href="assets/pdf/EOA-Report 22-23.PDF" target="_blank">GMCA AICTE EOA Report 2022-23</a>
                    </li>
                </div>
                <div class="links">
                    <li>
                        
                    <a class="link" href="assets/pdf/GMCA AICTE EOA Report_21-22.PDF" target="_blank">GMCA AICTE EOA Report 2021-22</a>
                    </li>
                </div>
                <div class="links">
                    <li>
                        
                    <a class="link" href="assets/pdf/GMCA_EOA_Report_2020-21.PDF" target="_blank">GMCA AICTE EOA Report 2020-21</a>
                    </li>
                </div>
                <div class="links">
                    <li>
                        
                    <a class="link" href="assets/pdf/GMCA EOA Report_2019-20.PDF" target="_blank">GMCA AICTE EOA Report 2019-20</a>
                    </li>
                </div>
            </div>
            
        </div>
        <div style="width:80%; margin:auto;" class="mb-3">
            <button type="button" class="collapsible">Financial Statements</button>
            <div class="content">
                
            </div>
            
        </div>
        <div style="width:80%; margin:auto;">
            <button type="button" class="collapsible">Delegation of Financial Power</button>
            <div class="content">
                <div class="links">
                    <li>
                    <a class="link" href="assets/pdf/DLPC.pdf" target="_blank">DLPC</a>
                    </li>
                </div>
                <div class="links">
                    <li>
                    <a class="link" href="assets/pdf/GSPP.pdf" target="_blank">Gujarat State Procurement Policy 2024</a>
                    </li>
                </div>
                <div class="links">
                    <li>
                        
                    <a class="link" href="#" target="_blank">SSIP</a>
                    </li>
                </div>
                <div class="links">
                    <li>
                        
                    <a class="link" href="#" target="_blank">DEDF</a>
                    </li>
                </div>
            </div>
            
        </div>

    </div>
</div>
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
</script>

@endsection