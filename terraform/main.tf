provider "aws"{
	region = "eu-north-1"
}

resource "aws_internet_gateway" "igw"{
	vpc_id = aws_vpc.main_vpc.id
	tags = {
		Name = "main-igw"
	}
}


resource "aws_route_table" "public_rt" {
  vpc_id = aws_vpc.main_vpc.id

  route {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.igw.id
  }

  tags = {
    Name = "public-route-table"
  }
}


resource "aws_route_table_association" "public_assoc" {
  subnet_id 	 = aws_subnet.public_subnet.id
  route_table_id = aws_route_table.public_rt.id
}

resource "aws_eip" "nat_eip_1" {
  vpc = true
}

resource "aws_nat_gateway" "nat_gw_1" {
  allocation_id = aws_eip.nat_eip_1.id
  subnet_id     = aws_subnet.private_subnet_1.id
}

resource "aws_eip" "nat_eip_2" {
  vpc = true
}

resource "aws_nat_gateway" "nat_gw_2" {
  allocation_id = aws_eip.nat_eip_2.id
  subnet_id     = aws_subnet.private_subnet_2.id
}


resource "aws_route_table" "private_rt_1" {
  vpc_id = aws_vpc.main_vpc.id

  route {
    cidr_block     = "0.0.0.0/0"
    nat_gateway_id = aws_nat_gateway.nat_gw_1.id
  }

  tags = {
    Name = "private-route-table-1"
  }
}

resource "aws_route_table" "private_rt_2" {
  vpc_id = aws_vpc.main_vpc.id

  route {
    cidr_block     = "0.0.0.0/0"
    nat_gateway_id = aws_nat_gateway.nat_gw_2.id
  }

  tags = {
    Name = "private-route-table-2"
  }
}


resource "aws_route_table_association" "private_assoc_1" {
  subnet_id      = aws_subnet.private_subnet_1.id
  route_table_id = aws_route_table.private_rt_1.id
}

resource "aws_route_table_association" "private_assoc_2" {
  subnet_id      = aws_subnet.private_subnet_2.id
  route_table_id = aws_route_table.private_rt_2.id
}



resource "aws_key_pair" "my_key" {
  key_name   = "terr-key"
  public_key = file("~/.ssh/my_new_key.pub")
}

resource "aws_instance" "web_server" {
  ami           = "ami-07c8c1b18ca66bb07"  
  instance_type = "t3.micro"
  subnet_id     = aws_subnet.public_subnet.id
  security_groups = [ aws_security_group.web_sg.id ]
  key_name      = aws_key_pair.my_key.key_name

  tags = {
    Name = "web-server"
  }
}



