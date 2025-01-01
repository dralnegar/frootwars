    <x-form.input 
        name="name" 
        label='name' 
        placeholder='Enter Category Name' 
        required=true 
        value="{{ old('name', $category->name) }}" 
    />
    
    <x-form.input 
        name="slug" 
        label='Slug' 
        placeholder='Enter Category Slug' 
        required=true 
        value="{{ old('slug', $category->slug) }}"
    />
    
    
    