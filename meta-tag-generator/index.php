<?php
/**
 * Created by PhpStorm.
 * User: srini @ acmeinfotec
 * Date: 12/28/14
 * Time: 3:42 PM
 */
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>HTML5 Form Builder</title>
    <meta charset="utf-8" />
    <link href="../css/main.css" type="text/css" rel="stylesheet" />
    <link href="css/meta-main.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="100%">
    <tr>
        <td>
            <div class="header-top">
                <div class="title"><a href="../index.php" >HTML5 Form Generator</a></div>
                <div class="social"><a href="www.facebook.com/pages/Acme-Groups">facebook</a><a href="www.twitter.com/cslearners">twitter</a></div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="meta-index-header">Meta Tag Generator</div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="contentSlider">
                <div class="contentContainer">
                    <div>
                        <div class="meta-index-body">
                            <table cellspacing="0" cellpadding="0" align="left" width="50%" >
                                <tr>
                                    <td><div>Title</div></td>
                                    <td><div><input type="text" name="txttitle" id="txttitle" data-name="title" placeholder="Title" /> </div></td>
                                </tr>
                                <tr>
                                    <td><div>Description</div></td>
                                    <td><div><textarea type="text" name="txtdescription" id="txtdescription" data-name="description"  placeholder="Description"></textarea></div></td>
                                </tr>
                                <tr>
                                    <td><div>Keywords</div></td>
                                    <td><div><input type="text" name="txtkeywords" id="txtkeywords" data-name="keywords"   placeholder="Keywords" /> </div></td>
                                </tr>
                                <tr>
                                    <td><div>Disable Cache</div></td>
                                    <td>
                                        <!--<div>
                                            <input type="radio" name="txtlanguage" id="radioYes" class="radioYes" data-name="language" checked="false"  placeholder="Language" value="On"/>
                                            <input type="radio" name="txtlanguage" id="radioNo" class="radioNo" data-name="language" checked="false"  placeholder="Language" value="Off"/>
                                            <div class="radioOnOff">
                                                <div class="btnYes">YES</div>
                                                <div class="btnNo">NO</div>
                                            </div>
                                        </div> -->
                                        <div>
                                            <select name="txtDisCache" id="txtDisCache" data-name="pragma" placeholder="Disable Cache">
                                                <option>None</option>
                                                <option>No cache</option>
                                            </select>
                                        </div></td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div>Language</div></td>
                                    <td><div><input type="text" name="txtlanguage" id="txtlanguage" data-name="language"   placeholder="Language" /> </div></td>
                                </tr>
                            </table>

                            <table cellspacing="0" cellpadding="0" align="left" width="50%" >
                                <tr>
                                    <td><div>Revisit-After</div></td>
                                    <td><div><input type="text" name="txttevisit" id="txttevisit" data-name="revisit-after"   placeholder="Revisit-After" /> </div></td>
                                </tr>
                                <tr>
                                    <td><div>Copyright</div></td>
                                    <td><div><input type="text" name="txtcopyright" id="txtcopyright" data-name="copyright"   placeholder="Copyright" /> </div></td>
                                </tr>
                                <tr>
                                    <td><div>Indexation</div></td>
                                    <td>
                                        <div>
                                            <select name="txtindexation" id="txtindexation" data-name="indexation"   placeholder="Indexation">
                                                <option>All</option>
                                                <option>None</option>
                                                <option>No Index</option>
                                                <option>Follow</option>
                                                <option>No Follow</option>
                                                <option>Index, Follow</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div>Charset</div></td>
                                    <td><div><input type="text" name="txtcharset" id="txtcharset" data-name="charset" value="UTF-8"  placeholder="Charset" /> </div></td>
                                </tr>
                                <tr>
                                    <td><div>Canonical URL</div></td>
                                    <td><div><input type="text" name="txtcanonical" id="txtcanonical" data-name="canonical_url"   placeholder="Website URL" /> </div></td>
                                </tr>
                                <tr>
                                    <td><div>Author</div></td>
                                    <td><div><input type="text" name="txtauthor" id="txtauthor" data-name="author"   placeholder="Author" /> </div></td>
                                </tr>
                            </table>
                        </div>
                        <div class="btnGenerate" align="center"><button onclick="generateCode()" class="btn1">Generate Code</button></div>
                    </div>

                    <div>
                        <div class="meta-index-preview" >
                            <div id="meta-index-preview"></div>
                        </div>
                        <div class="btnGenerate" style="margin-top: 0%" align="center"><button style="margin-top: 2%" class="btn2" onclick="">Create Again</button><!-- <button id="copytoclip" class="btn1">Copy To Clipboard</button> --></div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="footer" style="position: relative; top:20px;" >
                <div style="float:left;">
                    @copyrights from developers of Acme Groups | 2014
                </div>
                <div style="float:right;">

                </div>
            </div>
        </td>
    </tr>
</table>
</body>
<script type="text/javascript" src="../js/jquery-latest.min.js"></script>
<script type="text/javascript" >

    $(document).ready(function(){
        $(".btnNo").click(function(){
            $(".radioYes").attr("checked", false);
            $(".radioNo").attr("checked", true);
        });
        $(".btnYes").click(function(){
            $(".radioNo").attr("checked", false);
            $(".radioYes").attr("checked", true);
        });


        $(".btn1").click(function(){
            $(".contentContainer").css({"left":"-100%"});
        });

        $(".btn2").click(function(){
            $(".contentContainer").css({"left":"-0%"});
        });

        /*
            $('#copytoclip').clipboard({
                path: 'jquery.clipboard.swf',
                copy: function() {
                    alert('Text copied. Try to paste it now!);
                    return $('div#some-content').text();
                }
            });
        */



    });

    var text = '';
    function generateCode(){
        text = '';
        createTitle(document.getElementById('txttitle'));
        createMeta(document.getElementById('txtdescription'));
        createMeta(document.getElementById('txtkeywords'));
        createPragma(document.getElementById('txtDisCache'));
        createMeta(document.getElementById('txtlanguage'));
        createMeta(document.getElementById('txttevisit'));
        createMeta(document.getElementById('txtcopyright'));
        createMeta(document.getElementById('txtindexation'));
        createMeta(document.getElementById('txtcharset'));
        createMeta(document.getElementById('txtcanonical'));
        createMeta(document.getElementById('txtauthor'));

        document.getElementById('meta-index-preview').innerHTML = text;
    }
    function createMeta(str){
        dname = str.getAttribute("data-name") ;
        dvalue = str.value;
        text += '<span class="white_txt"><</span>';
        text += '<span class="green_txt">meta</span>';
        text += '<span class="orange_txt"> name</span>';
        text += '<span class="white_txt">="</span>'+dname;
        text += '<span class="white_txt">"</span>';
        text += '<span class="orange_txt"> content</span>';
        text += '<span class="white_txt">="</span>'+ dvalue;
        text += '<span class="white_txt">" /></span>';
        text += '<br />';
    }
    function createTitle(str){
        dname = str.getAttribute("data-name") ;
        dvalue = str.value;
        text += '<span class="white_txt"><</span>';
        text += '<span class="green_txt">title</span>';
        text += '<span class="white_txt">> </span>';
        text += dvalue;
        text += '<span class="white_txt"> <</span>';
        text += '<span class="green_txt">title</span>';
        text += '<span class="white_txt">/></span>';
        text += '<br />';
    }
    function createPragma(str){
        dname = str.getAttribute("data-name") ;
        dvalue = str.value;
        if(dvalue =='No cache')
        {
            text += '<span class="white_txt"><</span>';
            text += '<span class="green_txt">meta</span>';
            text += '<span class="orange_txt"> http-equiv</span>';
            text += '<span class="white_txt">="</span>'+dname;
            text += '<span class="white_txt">"</span>';
            text += '<span class="orange_txt"> content</span>';
            text += '<span class="white_txt">="</span>'+ dvalue;
            text += '<span class="white_txt">" /></span>';
            text += '<br />';
        }
    }

</script>

<script type="text/javascript" src="jquery.clipboard.js" />
</html>

