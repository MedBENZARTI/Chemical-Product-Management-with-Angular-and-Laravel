import { Component, OnInit, Input } from '@angular/core';
import { ActivatedRoute, Params, Router } from '@angular/router';

import { Product } from '../product.model';
import { ProductService } from '../product.service';

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.component.html',
  styleUrls: ['./product-detail.component.css'],
})
export class ProductDetailComponent implements OnInit {
  @Input() product: Product;
  id: number;

  constructor(
    private productService: ProductService,
    private route: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit() {
    this.route.params.subscribe((params: Params) => {
      this.id = +params['id'];
      this.product = this.productService.getProduct(this.id);
    });
  }
  onEditProduct() {
    this.router.navigate(['edit'], { relativeTo: this.route });
  }
  onDeleteProduct() {
    this.productService.deleteProduct(this.id);
    this.router.navigate(['products']);
  }

  // onAddToShoppingList() {
  //   this.productService.addIngredientsToShoppingList(this.product.ingredients);
  // }
}
