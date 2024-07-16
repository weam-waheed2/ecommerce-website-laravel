<div class="modal fade" tabindex="-1" id="gx_media_library">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content shadow-none">
            <div class="modal-header">
                <h5 class="modal-title">
                    معرض الصور
                </h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times text-secondary"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="row h-100">
                    <div class="col-lg-9 overflow-scroll bg-gray-500 h-100" gx_media_library="media-list-wrapper">

                    </div>
                    <div class="col-lg-3 bg-gray-100 d-flex align-items-start flex-column bd-highlight mb-3">
                        <!--begin::Input group-->
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Search" gx_media_library="search-input"/>
                            <select class="form-select" gx_media_library="search-dimensions" data-control="select2" data-dropdown-parent="#gx_media_library">
                                <option value="0">Dimensions</option>
                                <?php $__currentLoopData = App\Models\Media::distinct('dimensions')->select('dimensions')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dimension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($dimension->dimensions); ?>"><?php echo e($dimension->dimensions); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <!--end::Input group-->
                        <div class="text-center w-100">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="image-input-wrapper w-150px h-150px" gx_media_library="img-preview" style=" object-fit: cover; ">
                                <!--end::Preview existing avatar-->
                            </div>
                            <span gx_media_library="img-dimensions"></span>
                        </div>
                        <form class="text-center w-100" method="POST" gx_media_library="form" action="<?php echo e(url('admin/media/update')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="media[ID]" value="0">
                        	<div class="table-responsive">
                        		<table class="table table-row-dashed table-row-gray-300">
                        			<tbody>
                        				<tr>
                        					<td>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" placeholder=" " name="media[alt]"/>
                                                    <label>Alt</label>
                                                </div>
                        					</td>
                        				</tr>
                        				<tr>
                        					<td>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" placeholder=" " name="media[caption]"/>
                                                    <label>Caption</label>
                                                </div>
                        					</td>
                        				</tr>
                        				<tr>
                        					<td>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" placeholder=" " name="media[ID_view]"/>
                                                    <label>ID</label>
                                                </div>
                        					</td>
                        				</tr>
                        				<tr>
                        					<td>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" placeholder=" " name="media[url_view]"/>
                                                    <label>Url</label>
                                                </div>
                        					</td>
                        				</tr>
                        				<tr>
                        					<td>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-danger" gx_media_library="delete">Delete</button>
                        					</td>
                        				</tr>
                        			</tbody>
                        		</table>
                        	</div>
                        </form>

                        <div class="fv-row mb-2 mt-auto w-100">
                            <div class="dropzone" id="kt_ecommerce_add_product_media">
                                <input type="file" id="gx_media_library_file_input" multiple class="d-none">
                                <div class="dz-message needsclick" onclick="$('#gx_media_library_file_input').click();">
                                    <i class="ki-duotone ki-file-up text-primary fs-3x"><span class="path1"></span><span class="path2"></span></i>                    <!--end::Icon-->
                                    <div class="my-2">
                                        <h3 class="fs-3 fw-bold text-gray-900 mb-1 text-center">
                                            اختر صورة
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="progress" gx_media_library="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" gx_media_library="insert">Insert</button>
            </div>
        </div>
    </div>
</div>
<style>
[gx_media_library="media-list-item"].active img {
    border: 3px dashed #fff;
}
#gx_media_library img{
    width: 100px;
}
</style><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/admin/media/modal.blade.php ENDPATH**/ ?>