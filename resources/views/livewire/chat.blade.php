<div class="container max-vh-100 bg-light pt-2 pb-2">
    <div wire:poll.1000ms id="shows" class="row mb-1 p-2">
        <div class="col bg-body-tertiary" id="showChats">
            
            
            
            

            <div class="toast-container position-static">
            @foreach($chats as $chat)    
                <div class="toast fade show"  role="alert" aria-live="assertive" aria-atomic="true"  data-bs-autohide="false" >
                    <div class="toast-header" style="background-color:{{$chat->creator}};">
                        <strong class="me-auto"></strong>
                        <small class="text-body-secondary">{{ $chat->created_at->diffForHumans() }}</small>
                        @if($sender == $chat->creator || $sender == "#abefa2")
                        <button wire:click="delete({{$chat->id}})" type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" ></button>
                        @endif
                    </div>
                    <div class="toast-body">
                    {{$chat->message}}
                    </div>
                </div>
                @endforeach

            </div>
            <!-- <div class="spinner-border mt-2" role="status">
                <span class="visually-hidden">Loading...</span>
            </div> -->
        </div>
    </div>
    <div id="fields" class="row align-items-end">
        <form wire:submit="send" class=" border-top pt-2">

            <div class="input-group">
                <input type="text" wire:model="message" class="form-control" placeholder="پیامتان را بنویسید" aria-describedby="button-addon2">
                <button wire:click.prevent="send" class="btn btn-outline-secondary" type="button" id="button-addon2"> بفرست!</button>
            </div>
            @if (session()->has('status'))
            <span class="text-success">{{session('status') }}</span>
            @endif
        </form>
    </div>
</div>