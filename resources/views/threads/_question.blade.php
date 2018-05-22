<div class="card mb-3" style="width: 100%;" v-if="editing">
    <div class="card-header">
        <div class="level">
            <span class="flex">                                                              
                <input type="text" class="form-control" v-model="form.title">
            </span>            
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <wysiwyg v-model="form.body" :value="form.body"></wysiwyg>
            {{-- <textarea class="form-control" rows="10" v-model="form.body"></textarea> --}}
        </div>
    </div>
    <div class="card-footer">
        <div class="level">
            <div class="flex">
                <button class="btn btn-sm btn-default mr-1" @click="editing = true" v-show="! editing">Edit</button>
                <button class="btn btn-sm btn-primary mr-1" @click="update">Update</button>
                <button class="btn btn-sm btn-danger" @click="resetForm">Cancel</button>
            </div>
            @can ('update', $thread)
            <form action="{{ $thread->path() }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-link">Delete Thread</button>
            </form>
            @endcan
        </div>
    </div>
</div>  

<div class="card mb-3" style="width: 100%;" v-else>
    <div class="card-header">
        <div class="level">
            <img src="{{ $thread->creator->avatar_path }}" width="75" height="75" class="mr-2">
            <span class="flex">                                                              
                <h3 class="card-title"><a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted: <span v-text="title"></span></h3>
            </span>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text" v-html="body"></p>
    </div>
    <div class="card-footer" v-if="authorize('owns', thread)">
        <button class="btn btn-sm btn-default" @click="editing = true">Edit</button>
    </div>
</div>  