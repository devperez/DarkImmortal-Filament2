<div style="width:100%;  margin-top:50px; background-color:black;">
    <div style="width:50%; padding:15px; margin-left:auto; margin-right:auto;">
        <div class="flex">
            <input type="text" wire:model="author" placeholder="Votre nom/pseudo">
        </div>
        <div class="flex space-x-2 justify-center" style="margin-left:auto; margin-right:auto;">
            <textarea wire:model="body" type="text" class="block rounded border shadow p-2 mr-2 my-2" rows="5" style="width:100%;" placeholder="Votre commentaire"></textarea>
            <input type="hidden" wire:model="post_id" value="$post->id">
        </div>
            <div class="flex space-x-2 justify-center">
                <button style="background-color:#ff076e" class="block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs" wire:click="addComment">Envoyer !</button>
            </div>
            <p class="ml-3 pt-3" style="color:white">NB: les commentaires sont modérés à priori et n'apparaissent qu'une fois validés.</p>
        </div>
    </div>
</div>

