<input class="modal-state" id="modal-2" type="checkbox"/>
<div class="modal">
    <label class="modal-overlay" for="modal-2"></label>
    <div class="modal-content border-none flex w-full flex-col gap-5 p-7">
        <label for="modal-2"
               class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
        <div class="flex flex-col gap-2 border-none">
            <h1 class="text-2xl font-bold border-none">Add Stock / Book Price</h1>
            <p class="text-gray-500 border-none">Add stock or change the price of the book.</p>
        </div>
        <section class="border-none">
            <div class="form-group border-none">
                <div class="flex gap-3 border-none">
                    <div class="form-field border-none">
                        <label class="form-label border-none">
                            <span class="border-none">Stock</span>
                        </label>
                        <div class="form-control border-none">
                            <input placeholder="Stock Available" type="text"
                                   class="input max-w-full"/>
                        </div>
                    </div>
                    <div class="form-field border-none">
                        <label class="form-label border-none">
                            <span class="border-none">Harga</span>
                        </label>
                        <div class="form-control border-none">
                            <input placeholder="Rp." type="text"
                                   class="input max-w-full"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <button class="btn">Add Stock Book</button>
    </div>
</div>
