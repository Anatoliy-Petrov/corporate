<h5>Мета_теги <small>(необязательно для заполнения)</small></h5>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Meta_title ua </label>
            <input type="text" name="meta_title_uk" class="form-control"
                   value="{{ $page->meta_title_uk or '' }}" >
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Meta_description ua </label>
            <textarea name="meta_description_uk" class="form-control"
                      rows="4">{{ $page->meta_description_uk or '' }}</textarea>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Meta_keywords ua</label>
            <textarea name="meta_keywords_uk" class="form-control"
                      rows="4">{{ $page->meta_keywords_uk or '' }}</textarea>
        </div>
    </div>
</div>