<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('breadcrumb', ['documentId' => $document->id])->html();
} elseif ($_instance->childHasBeenRendered('l2404632802-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2404632802-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2404632802-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2404632802-0');
} else {
    $response = \Livewire\Livewire::mount('breadcrumb', ['documentId' => $document->id]);
    $html = $response->html();
    $_instance->logRenderedChild('l2404632802-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <div class="userlist-Dropdown float-right">
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="flex -space-x-1 overflow-hidden userlist">
                    <button
                            class="flex border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out p-2 font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            &nbsp;
                            Görüntüleyen kullanıcılar yükleniyor
                        </button>
                </div>
            </div>
        </div>
        <br><br>
        <div class="w-full mt-5">
            <div id="full-container">
                <div class="toolbar ql-toolbar">
                    <div class="ql-formats">
                        <select class="ql-size">
                            <option value="small"></option>
                            <option selected></option>
                            <option value="large"></option>
                            <option value="huge"></option>
                        </select>
                    </div>
                    <div class="ql-formats">
                        <select class="ql-header">
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            <option selected="selected"></option>
                        </select>
                    </div>
                    <div class="ql-formats">
                        <button class="ql-bold" title="Kalın"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-strike"></button>
                        <select class="ql-align"></select>
                    </div>
                    <div class="ql-formats">
                        <select class="ql-color">

                        </select>
                        <select class="ql-background">

                        </select>
                    </div>
                    <div class="ql-formats">
                        <button class="ql-table"></button>
                        <button class="ql-blockquote"></button>
                        <button class="ql-code-block"></button>
                    </div>
                    <div class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                        <button class="ql-indent" value="+1"></button>
                        <button class="ql-indent" value="-1"></button>
                    </div>
                    <div class="ql-formats">
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                    </div>
                    <div class="ql-formats">
                        <button class="ql-clean"></button>
                        <button class="download-pdf" onclick="window.location.href='<?php echo e(route('showDocumentAsPdf', $document->id)); ?>'"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg></button>
                    </div>
                </div>
                <div class="editor ql-container"></div>
            </div>
        </div>

    </div>
</div>
<?php $__env->startSection('scripts'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Renk ve isim gönderimi
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Quill Editor Instance
    var editorInstance;
    var providerInstance;

    // Editör cursor bilgileri
    var divergent_name = "<?php echo e(auth()->user()->name); ?>";
    var divergent_color = getRandomColor();
    var divergent_avatar = "<?php echo e(auth()->user()->profile_photo_url); ?>";

    // Quill.js dosyasına php tarafından passlamamız gereken değişkenler
    var documentUUID = "<?php echo e($document->id); ?>";
    var htmlToInsert = `<?php echo $document->content; ?>`;
    var saveRoute = '<?php echo e(route('saveDocument', $document->id)); ?>';
    var csrfToken = '<?php echo e(csrf_token()); ?>';
</script>

<!-- Quill editörü gereksinimleri -->
<script src="<?php echo e(asset('editor/highlight.min.js')); ?>" type="text/javascript"></script>
<link href="<?php echo e(asset('editor/quill.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('editor/quill.bundle.js')); ?>" type="text/javascript"></script>
<script>
    // Dbden Quill boş ise insertion yapıyoruz, Websocketin yetişmediği durumlarda gereklidir.
    function insertTextIntoEditor() {
        if (editorInstance) {
            function isQuillEmpty() {
                return editorInstance.getText().trim().length === 0
            }

            if (isQuillEmpty(editorInstance)) {
                editorInstance.clipboard.dangerouslyPasteHTML(htmlToInsert)
            }
        } else {
            setTimeout(() => {
                insertTextIntoEditor()
            }, 3000);
        }
    }
    insertTextIntoEditor();

    // Getting user list
    function getUserList() {
        if (providerInstance) {
            $(".userlist").html("");
            let userList = providerInstance.awareness.getStates().entries()
            userList = [...userList]
            userList.forEach(function (elem) {
                $(".userlist").append(
                    `<img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="${elem[1].user.avatar}" alt="${elem[1].user.name}">`
                )
            })
            setInterval(() => {
                if (document.hasFocus())
                {
                    getUserList();
                }
            }, 8000);
        } else {
            setTimeout(() => {
                getUserList();
            }, 3000);
        }
    }
    getUserList();
</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\collaborative-document-editor-development\server\resources\views/livewire/document/edit.blade.php ENDPATH**/ ?>