<div id="snippetArea">
    <script type="text/javascript">
        var editor;
        function selectSnippetContent()
        {
            editor.execCommand('selectAll');
        }
    </script>
    <div class="copy-snippet-content" onclick="selectSnippetContent()"></div>
    <textarea id="snippetContent" name="snippetContent">{{$code or 'Mettre code ici...'}}</textarea>

    <script type="text/javascript">
        editor = CodeMirror.fromTextArea(document.getElementById("snippetContent"), {
        theme: "monokai",
                mode: "{{$mode}}",
                readOnly: {{$readonly == true ? "true": "false"}},
                lineNumbers: true,
                //lineWrapping: true, // retour à la ligne automatiquement
                matchBrackets: true,
                smartIndent: true,
                indentUnit: 4,
                indentWithTabs: true,
                extraKeys: {"Ctrl-Space": "autocomplete"} // aux dernières nouvelles ne fonctionne pas sur firefox ou alors c'est un addon qui empeche son fonctionnement
        //autoCloseBrackets: true
        });
                // chargement du bon js pour le mode actuel
                CodeMirror.modeURL = "{{URL::asset('assets/codemirror/mode/%N/%N.js')}}";
                CodeMirror.autoLoadMode(editor, "{{$mode}}");
    </script>
</div>