export class Product {
  public name: string;
  public structure: string;
  public validationDate: string;
  public pH: string;
  public usingConditions: string;
  public imageUrl: string;

  constructor(
    name: string,
    structure: string,
    validationDate: string,
    pH: string,
    usingConditions: string,
    imageUrl: string
  ) {
    this.name = name;
    this.structure = structure;
    this.validationDate = validationDate;
    this.pH = pH;
    this.usingConditions = usingConditions;
    this.imageUrl = imageUrl;
  }
}
