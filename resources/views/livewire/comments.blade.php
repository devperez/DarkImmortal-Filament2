<div style="display:flex; flex-direction:column; align-items:center;">
    <div class="flex">
        <input type="text" wire:model="author" placeholder="Votre nom/pseudo">
    </div>
    <div class="flex space-x-2 justify-center">
        <textarea wire:model="body" type="text" class="block rounded border shadow p-2 mr-2 my-2" rows="5" style="width:35em" placeholder="Votre commentaire"></textarea>
        <input type="hidden" wire:model="post_id" value="$post->id" >
    </div>
        <div class="flex space-x-2 justify-center">
            <button style="background-color:#ff076e" class="block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" wire:click="addComment">Envoyer !</button>
        </div>
        <p class="ml-3 pt-3">NB: les commentaires sont modérés à priori et n'apparaissent qu'une fois validés.</p>


    </div>
</div>
