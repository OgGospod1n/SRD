<div class="float-left w-full mb-10">
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4" wire:loading>
        <button type="button"
            class="inline-flex items-center px-4 py-2 border border-transparent text-center leading-6 font-medium rounded-md text-white bg-gray-800  focus:outline-none transition ease-in-out duration-150 cursor-not-allowed"
            disabled="">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Dosyalar Yükleniyor
        </button>
    </div>
    
    <?php if($documents->count() <= 0): ?>
        <div class="w-full mb-10 text-center flex items-center justify-center" style="height: 600px;">
            <div class="w-64 h-64 bg-gray-200 rounded-full flex items-center justify-center flex-col">
                <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <div class="text-gray-500">Yeni düğmesine tıklayarak <br> dosya oluşturun</div>
            </div>
        </div>
    <?php endif; ?>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4" wire:loading.remove>
        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
        <div class="float-left bg-white rounded shadow hover:bg-gray-100 transition duration-500 document-item-<?php echo e($document["document_id"] ? $document["document_id"] : $document["id"]); ?>">
            <a href="<?php echo e(route('showDocument', $document["document_id"] ? $document["document_id"] : $document["id"])); ?>" class="block p-5">
                <svg class="-ml-1 mr-3 h-6 w-6 float-left" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                    </path>
                </svg>
                <div class="flex flex-col">
                    <div class="font-semibold w-full"><?php echo e($document["name"]); ?></div>
                    <div class="font-weight:300 text-gray-600 text-sm w-full"><?php echo e(\Carbon\Carbon::parse($document["updated_at"])->isoFormat('LLL')); ?>

                    </div>
                </div>
            </a>
        </div>

        <div id="html5menu-<?php echo e($document["document_id"] ? $document["document_id"] : $document["id"]); ?>" style="display:none" class="showcase">
            <command label="Редактировать" icon="edit" onclick="window.location.href='<?php echo e(route('showDocument', $document["document_id"] ? $document["document_id"] : $document["id"])); ?>'">
            <command label="Поделиться" onclick="window.location.href='<?php echo e(route('shareDocument', $document["document_id"] ? $document["document_id"] : $document["id"])); ?>'"> 
            <command label="Сохранить в формате PDF" onclick="window.location.href='<?php echo e(route('showDocumentAsPdf', $document["document_id"] ? $document["document_id"] : $document["id"])); ?>'">
            <hr>
            <command label="Удалить" icon="delete" onclick="deleteFiles('<?php echo e($document["document_id"] ? $document["document_id"] : $document["id"]); ?>', '<?php echo e($document["name"]); ?>', '<?php echo e(csrf_token()); ?>')">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php /**PATH C:\collaborative-document-editor-development\server\resources\views/livewire/document/show.blade.php ENDPATH**/ ?>