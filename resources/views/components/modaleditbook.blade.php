<input class="modal-state" id="modal-3" type="checkbox"/>
<div class="modal">
    <label class="modal-overlay" for="modal-3"></label>
    <div class="modal-content border-none flex w-full flex-col gap-5 p-7">
        <label for="modal-3"
               class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
        <div class="flex flex-col gap-2 border-none">
            <h1 class="text-2xl font-bold border-none">Edit Book</h1>
            <p class="text-gray-500 border-none">Edit the book details.</p>
        </div>
        <section class="border-none">
            <div class="form-group border-none">
                <div class="form-field border-none">
                    <input type="file" class="input-file"/>
                </div>
                <div class="form-field border-none">
                    <label class="form-label border-none">
                        <span class="border-none">Book Title</span>
                    </label>
                    <div class="form-control border-none">
                        <input placeholder="Type here" type="text"
                               class="input max-w-full"/>
                    </div>
                </div>
                <div class="flex gap-3 border-none">
                    <div class="form-field border-none">
                        <label class="form-label border-none">
                            <span class="border-none">Author</span>
                        </label>
                        <div class="form-control border-none">
                            <input placeholder="Type here" type="text"
                                   class="input max-w-full"/>
                        </div>
                    </div>

                    <div class="form-field justify-end w-1/2 border-none">
                        <select class="select">
                            <option value="" disabled selected>Category
                            </option>
                            <option value="fiction">Fiction</option>
                            <option value="non-fiction">Non-Fiction</option>
                            <option value="education">Education</option>
                            <option value="history">History</option>
                            <option value="biography">Biography</option>
                        </select>
                    </div>
                </div>
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
                <div class="form-field w-full border-none">
                    <label class="form-label border-none">
                        <span class="border-none">Description</span>
                    </label>
                    <div class="form-control border-none">
                                                            <textarea placeholder="Type here"
                                                                      class="textarea max-w-full h-1/2"></textarea>
                    </div>
                </div>
            </div>
        </section>
        <button class="btn">Add Book</button>
    </div>
</div>
