<input class="modal-state" id="modal-1" type="checkbox"/>
<div class="modal">
    <label class="modal-overlay" for="modal-1"></label>
    <div class="modal-content border-none flex w-full flex-col gap-5 p-7">
        <label for="modal-1"
               class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
        <div class="flex flex-col gap-2 border-none">
            <h2 class="text-2xl font-bold border-none">Edit Customer</h2>
            <p class="text-sm border-none">Edit customer data</p>
        </div>
        <section class="border-none space-y-4">
            <div class="form-group border-none">
                <div class="form-field border-none">
                    <label class="form-label border-none">
                        <span class="border-none">Name</span>
                    </label>
                    <div class="form-control border-none">
                        <input placeholder="Type here" type="text"
                               class="input max-w-full"/>
                    </div>
                </div>
            </div>
            <div class="form-group border-none">
                <div class="form-field border-none">
                    <label class="form-label border-none">
                        <span class="border-none">Email</span>
                    </label>
                    <div class="form-control border-none">
                        <input placeholder="Type here" type="email"
                               class="input max-w-full"/>
                    </div>
                </div>
            </div>
            <div class="form-group border-none">
                <div class="form-field border-none">
                    <label class="form-label border-none">
                        <span class="border-none">Password</span>
                    </label>
                    <div class="form-control border-none">
                        <input placeholder="Type here" type="password"
                               class="input max-w-full"/>
                    </div>
                </div>
            </div>
            <div class="form-group border-none">
                <div class="form-field border-none">
                    <label class="form-label border-none">
                        <span class="border-none">No. Phone</span>
                    </label>
                    <div class="form-control border-none">
                        <input placeholder="Type here" type="text"
                               class="input max-w-full"/>
                    </div>
                </div>
            </div>
            <div class="form-group border-none">
                <div class="form-field border-none">
                    <label class="form-label border-none">
                        <span class="border-none">Gender</span>
                    </label>
                    <div class="form-control border-none">
                        <select class="input max-w-1/2">
                            <option value="fiction">Male</option>
                            <option value="non-fiction">Female</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <button class="btn">Save</button>
    </div>
</div>
