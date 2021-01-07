import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, Subject } from 'rxjs';

import { Product } from './product.model';

// import { ShoppingListService } from '../shopping-list/shopping-list.service';

@Injectable()
export class ProductService {
  productsChanged = new Subject<Product[]>();

  private products: Product[] = [
    new Product(
      'Ethanoic acid',
      'CH3COOH',
      '1 AN',
      ' 2.6',
      ' do not touch it with your hands',
      'https://lh4.googleusercontent.com/-3Fxd36mh0zc/TWwrCCCzW4I/AAAAAAAAAAg/UBupehetK_o/s1600/Acetic+acid+with+arrows.png'
    ),
    new Product(
      'Acetone',
      'C3H6O',
      '2025-07-12',
      ' 7.00',
      ' Do not enhale it',
      'https://upload.wikimedia.org/wikipedia/commons/8/8d/Acetone-3D-balls.png'
    ),
    new Product(
      'Sulfuric acid',
      'H2SO4',
      '2026-05-06',
      ' 1.30',
      ' Do not enhale it',
      'https://upload.wikimedia.org/wikipedia/commons/c/c0/Sulfuric-acid-Givan-et-al-1999-3D-balls.png'
    ),
    new Product(
      'Nitric acid',
      'HNO3',
      '2030-12-11',
      '1.1',
      ' Exposure to nitric acid can cause irritation to the eyes',
      'https://upload.wikimedia.org/wikipedia/commons/8/81/Nitric-acid-3D-balls-A.png'
    ),
  ];

  constructor(private http: HttpClient) {}

  getProducts() {
    // return this.http.get('http://localhost:8000/api/produits');
    return this.products.slice();
  }

  getProduct(index: number) {
    return this.products[index];
  }

  addProduct(product: Product) {
    console.log(product);

    this.products.push(product);
    console.log(this.products);

    this.productsChanged.next(this.products.slice());
  }
  updateProduct(index: number, newProduct: Product) {
    console.log(newProduct);

    this.products[index] = newProduct;
    this.productsChanged.next(this.products.slice());
  }

  deleteProduct(index: number) {
    this.products.splice(index, 1);
    this.productsChanged.next(this.products.slice());
  }
  // addIngredientsToShoppingList(ingredients: Ingredient[]) {
  //   this.slService.addIngredients(ingredients);
}
