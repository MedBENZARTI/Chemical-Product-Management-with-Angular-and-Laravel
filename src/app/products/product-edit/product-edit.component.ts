import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Params, Router } from '@angular/router';
import { Product } from '../product.model';
import { ProductService } from '../product.service';

@Component({
  selector: 'app-product-edit',
  templateUrl: './product-edit.component.html',
  styleUrls: ['./product-edit.component.css'],
})
export class ProductEditComponent implements OnInit {
  id: number;
  editMode = false;
  productForm: FormGroup;
  constructor(
    private route: ActivatedRoute,
    private productService: ProductService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.route.params.subscribe((params: Params) => {
      this.id = +params['id'];
      this.editMode = params['id'] != null;
      this.initForm();
    });
  }

  onCancel() {
    this.router.navigate(['../'], { relativeTo: this.route });
  }

  onSubmit() {
    const newProduct = new Product(
      this.productForm.value['name'],
      this.productForm.value['Structure'],
      this.productForm.value['ValidationDate'],
      this.productForm.value['pH'],
      this.productForm.value['UsingConds'],
      this.productForm.value['ImageUrl']
    );
    if (this.editMode) {
      this.productService.updateProduct(this.id, newProduct);
    } else {
      this.productService.addProduct(newProduct);
    }
    this.onCancel();
  }

  private initForm() {
    let ProductName = '';
    let ProductStructure = '';
    let ProductValidationDate = '';
    let ProductpH = '';
    let ProductUsingConds = '';
    let ProductImageUrl = '';
    if (this.editMode) {
      const product = this.productService.getProduct(this.id);
      ProductName = product.name;
      ProductStructure = product.structure;
      ProductValidationDate = product.validationDate;
      ProductpH = product.pH;
      ProductUsingConds = product.usingConditions;
      ProductImageUrl = product.imageUrl;
    }
    this.productForm = new FormGroup({
      name: new FormControl(ProductName, Validators.required),
      Structure: new FormControl(ProductStructure, Validators.required),
      ValidationDate: new FormControl(
        ProductValidationDate,
        Validators.required
      ),
      pH: new FormControl(ProductpH, Validators.required),
      UsingConds: new FormControl(ProductUsingConds, Validators.required),
      ImageUrl: new FormControl(ProductImageUrl, Validators.required),
    });
  }
}
