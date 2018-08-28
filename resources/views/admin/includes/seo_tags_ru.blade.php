<h5>Мета_теги <small>(необязательно для заполнения)</small></h5>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Meta_title ru </label>
            <input type="text" name="meta_title_ru" class="form-control"
                   value="{{ $page->meta_title_ru or '' }}" >
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Meta_description ru </label>
            <textarea name="meta_description_ru" class="form-control"
                      rows="4">{{ $page->meta_description_ru or '' }}</textarea>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Meta_keywords ru</label>
            <textarea name="meta_keywords_ru" class="form-control"
                      rows="4">{{ $page->meta_keywords_ru or '' }}</textarea>
        </div>
    </div>
</div>